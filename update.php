<?php
// Script de mise à jour automatique depuis une source web (télécharge et extrait update.zip)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'check') {
        // Vérification de version
        $local_version = '0.0.0';
        $local_version_file = __DIR__ . '/version.txt';
        if (file_exists($local_version_file)) {
            $local_version = trim(file_get_contents($local_version_file));
        }
        $remote_base_url = 'http://tournoi.lepaletdutrefle.fr/update/';
        $remote_version_url = $remote_base_url . 'version.txt';
        $remote_version = null;
        $remote_version_content = @file_get_contents($remote_version_url);
        if ($remote_version_content !== false) {
            $remote_version = trim($remote_version_content);
        }
        function version_compare_strict($v1, $v2) {
            return version_compare($v1, $v2, '<');
        }
        if ($remote_version) {
            echo '<div class="uk-alert-primary uk-alert">Version locale : <b>' . htmlspecialchars($local_version) . '</b> | Version distante : <b>' . htmlspecialchars($remote_version) . '</b></div>';
            if (version_compare_strict($local_version, $remote_version)) {
                echo '<button id="doUpdateBtn" class="uk-button uk-button-danger uk-margin-top">Mettre à jour</button>';
            } else {
                echo '<div class="uk-alert-success uk-alert">Votre version est à jour.</div>';
            }
        } else {
            echo '<div class="uk-alert-warning uk-alert">Impossible de vérifier la version distante.</div>';
        }
        exit;
    }
    if ($action === 'update') {
        $remote_zip_url = 'http://tournoi.lepaletdutrefle.fr/update/update.zip';
        $local_zip = __DIR__ . '/update.zip';
        $extract_to = __DIR__ . '/';  // Racine du projet
        // Téléchargement du zip
        $zip_content = @file_get_contents($remote_zip_url);
        if ($zip_content === false) {
            echo "<div class='uk-alert-danger uk-alert'>Échec du téléchargement de update.zip depuis le web.</div>";
            exit;
        }
        file_put_contents($local_zip, $zip_content);
        // Extraction du zip
        $zip = new ZipArchive();
        if ($zip->open($local_zip) === TRUE) {
            $zip->extractTo($extract_to);
            $zip->close();
            unlink($local_zip);
            echo "<div class='uk-alert-success uk-alert'>Mise à jour terminée avec succès !</div>";
        } else {
            echo "<div class='uk-alert-danger uk-alert'>Impossible d'extraire l'archive ZIP.</div>";
        }
        exit;
    }
}
// ...existing code...
