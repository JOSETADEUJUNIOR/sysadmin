<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Os_dataview.php';

use Src\_public\Util; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- Select2 -->
    <link rel="stylesheet" href="../../Template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../Template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../../Template/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.20.3/jodit.min.css" />

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once PATH_URL . '/Template/_includes/_topo.php';
        include_once PATH_URL . '/Template/_includes/_menu.php'
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->




            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ordens de Serviços</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Gerenciar Ordem de Serviços</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Cadastrar garantia

                                </h3>
                                <!-- tools box -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Bootstrap WYSIHTML5
                                    <small>Simple and fast</small>
                                </h3>
                                <!-- tools box -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <p class="text-sm mb-0">
                                    Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                                        information.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </section>
            <!-- Main content -->


            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ordens Cadastradas</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" onkeyup="FiltrarProduto(this.value)" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="tabela_result_os">
                                    <thead>
                                        <tr>
                                            <th>Ação</th>
                                            <th>[NºOS] - Nome do cliente</th>
                                            <th>Dt Inicio</th>
                                            <th>Dt Entrega</th>
                                            <th>Tecnico</th>
                                            <th>Valor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $soma = 0;
                                        for ($i = 0; $i < count($os); $i++) { ?>
                                            <tr>
                                                <td>
                                                    <?php if ($os[$i]['OsFaturado'] == 'N') { ?>
                                                        <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                                                        <?php foreach ($dadosOS as $do) {
                                                            if ($do['OsID'] == $os[$i]['OsID']) {
                                                                $prodOS = $do['ProdOs_osID'];
                                                                $servOS = $do['ServOs_osID'];
                                                                $anxOS = $do['AnxOsID'];
                                                            }
                                                        } ?>
                                                        <?php if ($prodOS == '' && $servOS == '' && $anxOS == '') { ?>
                                                            <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                        <?php } ?>
                                                        <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                        <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                                                    <?php } ?>
                                                    <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                                                </td>
                                                <td><?= '[' . $os[$i]['OsID'] . ']' . ' - ' . $os[$i]['nomeCliente'] ?></td>
                                                <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                                                <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                                                <td><?= $os[$i]['OsTecID'] ?></td>
                                                <td><?= Util::FormatarValor($soma = $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>

                                                <td><?php
                                                    $status = '';
                                                    if ($os[$i]['OsStatus'] == "O") {
                                                        $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                                    } else if ($os[$i]['OsStatus'] == "A") {
                                                        $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                                    } else if ($os[$i]['OsStatus'] == "EA") {
                                                        $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                                    } else if ($os[$i]['OsStatus'] == "F") {
                                                        $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                                    } else if ($os[$i]['OsStatus'] == "C") {
                                                        $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                                    } ?>
                                                    <?= $status ?>
                                                    <?php $texto = "$os[$i]['OsDefeito']"; ?>
                                                    <?= ($os[$i]['OsStatus'] != "F" ? '' : ($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>

                                                    <?php
                                                    $os[$i]['CliNome'] = str_replace(' ', '%20', $os[$i]['nomeCliente']);
                                                    $telefone = Util::remove_especial_char(trim($os[$i]['CliTelefone']));
                                                    $inicio_texto = "Olá, tudo bem?<br /><br /> Somo da *{$dadosEmp[0]['EmpNome']}<br /><br />*Segue o orçamento:*{$os[$i]['OsID']}*<br /><br />Nome do cliente: *{$os[$i]['nomeCliente']}*<br /><br />Defeito:";
                                                    $enviarDadosAparelho = str_replace('<br /', '%0A', $os[$i]['OsDescProdServ']);
                                                    $enviarOrcamento = str_replace('<br /', '%0A', $os[$i]['OsDefeito']);
                                                    $valorOS = str_replace('<br /', '%0A', $os[$i]['OsValorTotal']);
                                                    $linkTratado = "{$inicio_texto}";
                                                    $linkTratado = str_replace('<br />', '%0A', $linkTratado);
                                                    $linkTratado = str_replace(' ', '%20', $linkTratado);

                                                    $link = "https://api.whatsapp.com/send?phone=55{$telefone}&text=🔔%20{$linkTratado}%0A{$enviarOrcamento}%0ADados do aparelho:%0A{$enviarDadosAparelho}%0AValor do Serviço: R$:{$valorOS}";
                                                    ?>
                                                    <a class="btn btn-primary btn-xs " aria-label="WhatsApp" href="<?= $link ?>" target="_blank">Enviar orçamento</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </div>

        </section>


        <!-- /.content -->

        <!-- /.content-wrapper -->
        <form action="ordem_servico.php" id="form_alt_os" method="post">
            <?php include_once 'modal/_excluir.php' ?>

        </form>
        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/os-ajx.js"></script>
    <script src="../../Template/plugins/select2/js/select2.full.min.js"></script>
    <script src="../../Template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../Template/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.20.3/jodit.min.js"></script>
    <script>
        $(function() {
                // Summernote
                $('.textarea').summernote({

                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['misc', ['print']],
                        ['view', ['fullscreen']],
                    ],
                    print: {
                        'stylesheetUrl': 'url_of_stylesheet_for_printing'
                    },
                    placeholder: 'garantia....',
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],







                })
            })
            (function(factory) {
                /* global define */
                if (typeof define === 'function' && define.amd) {
                    // AMD. Register as an anonymous module.
                    define(['jquery'], factory);
                } else if (typeof module === 'object' && module.exports) {
                    // Node/CommonJS
                    module.exports = factory(require('jquery'));
                } else {
                    // Browser globals
                    factory(window.jQuery);
                }
            }(function($) {
                // Extends lang for print plugin.
                $.extend(true, $.summernote.lang, {
                    'en-US': {
                        print: {
                            print: 'Print'
                        }
                    },
                    'ko-KR': {
                        print: {
                            print: '인쇄'
                        }
                    },
                    'pt-BR': {
                        print: {
                            print: 'Imprimir'
                        }
                    }
                });

                // Extends plugins for print plugin.
                $.extend($.summernote.plugins, {
                    /**
                     * @param {Object} context - context object has status of editor.
                     */
                    'print': function(context) {
                        var self = this;

                        // ui has renders to build ui elements.
                        //  - you can create a button with `ui.button`
                        var ui = $.summernote.ui;
                        var $editor = context.layoutInfo.editor;
                        var options = context.options;
                        var lang = options.langInfo;

                        var isFF = function() {
                            const userAgent = navigator.userAgent;
                            const isEdge = /Edge\/\d+/.test(userAgent);
                            return !isEdge && /firefox/i.test(userAgent)
                        }

                        var fillContentAndPrint = function($frame, content) {
                            $frame.contents().find('body').html(content);

                            setTimeout(function() {
                                $frame[0].contentWindow.focus();
                                $frame[0].contentWindow.print();
                                $frame.remove();
                                $frame = null;
                            }, 250);
                        }

                        var getPrintframe = function($container) {
                            var $frame = $(
                                '<iframe name="summernotePrintFrame"' +
                                'width="0" height="0" frameborder="0" src="about:blank" style="visibility:hidden">' +
                                '</iframe>');
                            $frame.appendTo($editor.parent());

                            var $head = $frame.contents().find('head');
                            if (options.print && options.print.stylesheetUrl) {
                                // Use dedicated styles
                                var css = document.createElement('link');
                                css.href = options.print.stylesheetUrl;
                                css.rel = 'stylesheet';
                                css.type = 'text/css';
                                $head.append(css);
                            } else {
                                // Inherit styles from document
                                $('style, link[rel=stylesheet]', document).each(function() {
                                    $head.append($(this).clone());
                                });
                            }

                            return $frame;
                        };

                        // add print button
                        context.memo('button.print', function() {
                            // create button
                            var button = ui.button({
                                contents: '<i class="fa fa-print"/> ' + lang.print.print,
                                tooltip: lang.print.print,
                                container: options.container,
                                click: function() {
                                    var $frame = getPrintframe();
                                    var content = context.invoke('code');

                                    if (isFF()) {
                                        $frame[0].onload = function() {
                                            fillContentAndPrint($frame, content);
                                        };
                                    } else {
                                        fillContentAndPrint($frame, content);
                                    }
                                }
                            });
                            return button.render();
                        });
                    }
                });
            }));
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('#Oscliente').select2({
                theme: 'bootstrap4'
            })

            $('#AlteraOscliente').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

    <script>
        const editor = Jodit.make("#editor", {
            "iframe": true,
            "uploader": {
                "insertImageAsBase64URI": true
            },
            "language": "pt_br",
            "buttons": "bold,italic,underline,strikethrough,eraser,ul,ol,font,fontsize,file,image,hr,table,link,print,find,preview,about"
        });
    </script>

</body>

</html>