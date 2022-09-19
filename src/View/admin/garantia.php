<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/Garantia_dataview.php';

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
                            <h1>Edição de garantia</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Administrador</a></li>
                                <li class="breadcrumb-item active">Cadastro de Garantia</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <form action="garantia.php" method="post">
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
                                    <div class="form-group">
                                        <input type="hidden" name="grtID" value="<?= $garantia[0]['grtID']?>">
                                        <label>Nome do documento</label>
                                        <input class="form-control obg" id="nome" name="nome" value="<?= $garantia[0]['grtNome']?>" placeholder="Digite o nome....">
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="editor" name="editor"><?= $garantia[0]['grtText']?></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-success col-md-12" name="btn_cadastrar">Cadastrar</button>

                                </div>
                            </div>
                        </div>

                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                </section>

            </form>
            <!--<section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Bootstrap WYSIHTML5
                                    <small>Simple and fast</small>
                                </h3>
                              
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                                
                            </div>
                            <div class="card-body pad">
                                <div class="mb-3">
                                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                  
                </div>
                
            </section>
             Main content -->


        </div>


        <!-- /.content -->

        <!-- /.content-wrapper -->
        <form action="garantia.php" id="form_garantia" method="post">
            <?php include_once 'modal/_excluir.php' ?>

        </form>
        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
        <!-- /.control-sidebar -->

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