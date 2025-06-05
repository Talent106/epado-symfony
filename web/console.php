<html>
    <head>
        <meta charset="UTF-8">
        <title>Console</title>
    </head>
    <body style='font-family: monospace;'>
        <h1>Console</h1>
        <form method='POST'>
            <fieldset>
                <legend>Comandi base</legend>               
                <p><button name='pre_cmd[]' value='cache:clear'>Clear Cache</button></p>
                <p><button name='pre_cmd[]' value='assets:install'>Install Assets</button></p>
            </fieldset>
            <fieldset>
                <legend>Comando personalizzato</legend>             
                <p>php app/console <input type='text' name='cmd' value='' /><input type='submit' value='Esegui' name='submit' /> <input type='reset' value='Annulla' /></p>
            </fieldset>
        </form>
        <?php
        if ($_POST) {
            $cmd = $_POST['cmd'] ? $_POST['cmd'] : (is_array($_POST['pre_cmd']) ? $_POST['pre_cmd'][0] : false);
            if ($cmd) {
                echo "<div style='color:white;background:black;padding:10px'>";
                echo "<pre>";
                $output = array();
                exec($_SERVER['DOCUMENT_ROOT'] . '\console.bat "' . $cmd . '"', $output);
                foreach ($output as $o) {
                    echo htmlspecialchars($o);
                    echo PHP_EOL;
                }
                echo "</pre>";
                echo "</div>";
            } else {
                echo "<p>Comando vuoto</p>";
            }
        }
        ?>
    </body>
</html>