<?php

if (isset($ret)) {

    switch ($ret):
        case -4:
            echo '
            <script>
                MensagemLogin();
            </script>';

            break;
        case -1:
            echo '
            <script>
                MensagemErro();
            </script>';

            break;

        case 0:

            echo '
                <script>
                    MensagemCamposObrigatorios();
                </script>';
            break;

        case 1:
            echo '
            <script>
                MensagemSucesso();
            </script>';
            break;

    endswitch;
}

