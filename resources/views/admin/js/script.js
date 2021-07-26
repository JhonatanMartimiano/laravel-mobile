$(function () {
    /*
    * ==========================================================
    * ======================== THEME FNCs ============================
    * ==========================================================
    * */

    // ==============================================================
    // Auto select left navbar
    // ==============================================================

    $('#sidebarnav a').on('click', function (e) {
        console.log("click");
        if (!$(this).hasClass("active")) {
            // hide any open menus and remove all other classes
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");

            // open our new menu and add the open class
            $(this).next("ul").addClass("in");
            $(this).addClass("active");

        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    })
    $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
        e.preventDefault();
    });
    // ==============================================================
    // This is for the top header part and sidebar part
    // ==============================================================
    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 55;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").addClass("ti-menu");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);
    $('.navbar-brand b').hide();
    // ==============================================================
    // Theme options
    // ==============================================================
    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand b').hide();
            $('.navbar-brand span').show();
        } else {
            $("body").trigger("resize");
            $("body").addClass("mini-sidebar");
            $('.navbar-brand b').show();
            $('.navbar-brand span').hide();
        }
    });
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });

    // ==============================================================
    // Perfact scrollbar
    // ==============================================================
    $('.scroll-sidebar, .right-side-panel, .message-center, .right-sidebar').perfectScrollbar();
    $('#chat, #msg, #comment, #todo').perfectScrollbar();

    /*
    * ====================== END THEME FNCs ==========================
    * */

    /*
    * ==========================================================
    * ======================== GERAL ============================
    * ==========================================================
    * */

    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation();
    });

    $("body").trigger("resize");

    $('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popover"]').popover()

    /* Preloader fadeOut() */
    $(document).ready(function () {
        $(".preloader").fadeOut(700);
    });

    /*
    * ====================== END GERAL ==========================
    * */

    /*
    * ==========================================================
    * ======================== AJAX ============================
    * ==========================================================
    * */

    $('html').on('submit', 'form.j_show_loader', function () {
        $(".ajax-loader").fadeIn('fast');
        $(".loader-form").fadeIn('500');

        setTimeout(function () {
            $(".ajax-loader").fadeOut('fast');
            $(".loader-form").fadeOut('500');
        }, 5000);
    });
    /* Formulario é disparado no change do input */
    $('html').on('change', '.j_input_form_submit', function (e) {
        var valorSetado = ($(this).val() != "" ? $(this).val() : "0,00");
        var prev_valor = (typeof $(this).data('val') === 'undefined' ? "0,00" : $(this).data('val'));


        if (valorSetado != prev_valor) {
            var trigger = $(this).attr("id");
            var form = $($(this).attr('data-form'));
            var url = form.attr('action');

            $(".ajax-loader").fadeIn('fast');
            $(".loader-form").fadeIn('500');
            form.find("button[type='submit']").attr("disabled", "disabled");

            form.ajaxSubmit({
                url: url,
                dataType: 'json',
                data: {trigger: trigger},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $(".ajax-loader").fadeOut('500');
                    $(".loader-form").fadeOut('400');
                    form.find("button").removeAttr("disabled");
                    // <---------------------------------------------------------------

                    // Abre modal
                    if (data.modalOpen) {
                        $(data.modalOpen).modal('show');
                    } else {
                        /* Seto o valor atual em todos os campos do formulario para evitar erros (somente se o modal não for aberto) */
                        form.find(".form-control").each(function (key, value) {
                            $(this).data('val', ($(this).val() === "" ? 0 : $(this).val()));
                        });
                    }

                    if (data.modalClose) {
                        $(data.modalClose).modal('hide');
                    }
                    // Atualiza o data-targe do botão de fechamento do modal, utilizado para retornar o valor antigo de um input
                    if (data.modalBtnTarget) {
                        $("#closeModalMasterPassword").attr('data-target', data.modalBtnTarget);
                    }

                    if (data.show) {
                        $(data.show).slideDown();
                    }

                    if (data.toast) {
                        toastMake(data);
                    }

                    if (data.contentHtml) {
                        $.each(data.contentHtml, function (key, value) {
                            $(key).html(value);
                        });
                    }

                    // Popula inputs de formulario
                    if (data.content) {
                        $.each(data.content, function (key, value) {
                            $("#" + key).val(value);
                        });
                    }

                    /* Desmarca check do input */
                    if (data.removeChecked) {
                        $(data.removeChecked).prop('checked', false);
                    }

                    // Popula inputs de formulario
                    if (data.inputData) {
                        $.each(data.inputData, function (key, value) {
                            $("#" + key).val(value);
                        });
                    }
                    // Retorna valor do input ao estado anterior
                    if (data.inputLoad) {
                        $.each(data.inputLoad, function (key, value) {
                            $("#" + value).val($("#" + value).data('val'));
                        });
                    }

                    // Insere HTML no container
                    if (data.htmlData) {
                        $.each(data.htmlData, function (key, value) {
                            $(key).html(value);
                        });
                    }
                }
            });
        }
    });

    /* FORM AUTOSAVE ACTION */
    $('html').on('change', 'form.auto_save', function (e) {
        e.preventDefault();
        e.stopPropagation();

        /* Não executa a requisição se data-off = true */
        var isOff = $("#" + e.target.id).attr('data-off');

        if (isOff !== 'true') {
            var form = $(this);
            var url = form.attr('action');

            $(".ajax-loader").fadeIn('500');
            $(".loader-form").fadeIn('500');

            form.ajaxSubmit({
                url: url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $(".ajax-loader").fadeOut('500');
                    $(".loader-form").fadeOut('500');
                    if (data.toast) {
                        toastMake(data);
                    }

                    /* Seto o valor atual em todos os campos do formulario para evitar erros (somente se o modal não for aberto) */
                    form.find(".form-control").each(function (key, value) {
                        $(this).data('val', ($(this).val() === "" ? 0 : $(this).val()));
                    });

                    if (data.contentHtml) {
                        $.each(data.contentHtml, function (key, value) {
                            $(key).html(value);
                        });
                    }

                    // Popula inputs de formulario
                    if (data.content) {
                        $.each(data.content, function (key, value) {
                            $("#" + key).val(value);
                        });
                    }

                    /* Desmarca check do input */
                    if (data.removeChecked) {
                        $(data.removeChecked).prop('checked', false);
                    }

                    if (data.sweet) {
                        sweetMake(data.sweet);
                    }

                    /* Receber Crediario */
                    if (data.receber_crediario) {
                        // if (data.success) {
                        //     $("#crediario_identificar").slideUp(600, function () {
                        //         $("#crediario_receber").slideDown(600, function () {
                        //             var y = parseInt($("#crediario_receber").offset().top) - 200;
                        //             $('html, body').animate({scrollTop: y}, 400);
                        //         });
                        //     });
                        // }
                    }
                }
            });
        }

    });

    /* Formulario é salvo automaticamente mas primeiro é exibido uma popup de confirmação */
    $('html').on('change', 'form.auto_save_verify', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        var form_data = form.serializeArray();
        var url = form.attr('action');
        var max_value = form.attr('data-verify');

        // Se o valor setado for maior que o valor definido pelo sistema no atributo data-verify exibe a mensagem do atributo data-verify-msg
        if (form_data[1].value > max_value) {
            var message = form.attr('data-verify-msg');
        } else {
            var message = "A alteração deste valor tem grande impacto em sua loja, prossiga apenas se estiver certo desta ação.";
        }

        Swal.fire({
            titleText: "Atenção!",
            text: message,
            icon: "warning",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showCancelButton: true,
            confirmButtonText: "Prosseguir!",
            confirmButtonColor: "#23903c",
            cancelButtonText: "Cancelar e retornar",
            cancelButtonColor: "#dd3c4c",
            focusCancel: true,
            backdrop: "rgba(0,0,0,0.8)",

        }).then((result) => {
            /*
            * Se o usuário abortar a alteração será recuperado o valor antigo do input e setado nele novamente
            *  */
            if (result.dismiss === Swal.DismissReason.cancel) {
                var prev = form.find('input[name="valor"]').data('val');
                form.find('input[name="valor"]').val(prev);
            } else {
                /* Ao confirmar a ação, o submit é disparado e o fluxo segue a diante */
                $(".ajax-loader").fadeIn('500');
                form.ajaxSubmit({
                    url: url,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        $(".ajax-loader").fadeOut('500');
                        if (data.toast) {
                            toastMake(data);
                        }
                    }
                });
            }
        });
    });

    /* FORM AJAX SUBMIT */
    $('html').on('submit', 'form.ajax_submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        var modalToClose = form.attr('data-modalclose');
        /* Utilizado para indicar ao backend que a ação do submit foi disparada pelo botão de submit */
        if (form.attr('data-verify') == 1) {
            $("input#verify").val(1);
        }

        form.ajaxSubmit({
            url: form.attr('action'),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                if (modalToClose) {
                    $(modalToClose).modal('hide')
                }
                if (form.attr('data-modal')) {
                    $(".ajax-loader-modal").fadeIn('fast');
                    $("#" + form.attr('data-modal') + "Error").html("").slideUp(400);
                    $("#" + form.attr('data-modal')).find('button.close').attr('disabled', true);
                } else {
                    $(".ajax-loader").fadeIn('fast');
                    $(".loader-form").fadeIn('500');
                }
                form.find("button[type='submit']").attr('disabled', true);
            },
            success: function (data) {
                if (form.attr('data-modal')) {
                    $(".ajax-loader-modal").fadeOut('fast');
                    $("#" + form.attr('data-modal')).find('button.close').attr('disabled', false);
                }
                if (form.attr('data-verify') == 1) {
                    $("input#verify").val(0);
                }
                $(".ajax-loader").fadeOut('fast');
                $(".loader-form").fadeOut('fast');
                form.find("button[type='submit']").attr('disabled', false);

                /* Mensagem de erro exibida no modal */
                if (data.modal_error) {
                    $("#" + form.attr('data-modal') + "Error").html(data.modal_error).slideDown(400);
                }

                if (data.dataSlide) {
                    $.each(data.dataSlide, function (key, item) {
                        $(item).slideDown(600);
                    });
                }

                /* Exibir/Esconder elementos */
                if (data.hide && data.show) {
                    $(data.hide).fadeOut(300, function () {
                        $(data.show).fadeIn(300);
                    });
                }
                if (data.show && !data.hide) {
                    $(data.show).fadeIn(300);
                }
                if (!data.show && data.hide) {
                    $(data.hide).fadeOut(300);
                }
                // <--------------------------- END

                /* Mensagens de alerta */
                if (data.toast) {
                    toastMake(data);
                }

                if (data.removeChecked) {
                    $(data.removeChecked).prop('checked', false);
                }

                if (data.redirect) {
                    setTimeout(function () {
                        window.location.href = data.redirect;
                    }, 900)
                }

                if (data.modalClose) {
                    $(data.modalClose).modal('hide');
                }

                if (data.modalOpen) {
                    $(data.modalOpen).modal('show');
                }

                if (data.inputClear) {
                    $(data.inputClear).val("");
                }

                if (data.refresh) {
                    document.location.reload(true);
                }


                if (data.contentHtml) {
                    $.each(data.contentHtml, function (key, value) {
                        $(key).html(value);
                    });
                }

                // Popula inputs de formulario
                if (data.content) {
                    $.each(data.content, function (key, value) {
                        $("#" + key).val(value);
                    });
                }
                // Limpa inputs
                if (data.clearInput) {
                    $.each(data.clearInput, function (key, value) {
                        $("#" + value).val('');
                    });
                }
                // Desabilita Inputs
                if (data.disableInput) {
                    $.each(data.disableInput, function (key, value) {
                        $("#" + value).attr('readonly', true);
                    });
                }

                if (data.dataTableInit) {
                    var iniData = {
                        "dom": 'Bfrtip',
                        "pageLength": data.dataTableInit.pageLength,
                        "order": [data.dataTableInit.orderColumn, data.dataTableInit.orderDir],
                        "language": {
                            "sLengthMenu": "Mostrar _MENU_ registros por página",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                            "sInfoFiltered": "(filtrado de _MAX_ registros)",
                            "search": "Pesquisar: ",
                            "processing": "Buscando dados aguarde...",
                            "oPaginate": {
                                "sFirst": "Início",
                                "sPrevious": "Anterior",
                                "sNext": "Próximo",
                                "sLast": "Último"
                            }
                        },
                    };

                    if (data.dataTableInit.print) {
                        iniData.buttons = {
                            dom: {
                                button: {
                                    tag: 'button',
                                    className: ''
                                }
                            },
                            "buttons": [
                                {
                                    extend: 'print',
                                    autoPrint: false,
                                    text: 'Imprimir Relatório<i class="fas fa-print ml-2"></i>',
                                    title: '',
                                    className: 'btn btn-info',
                                    exportOptions: {
                                        columns: data.dataTableInit.printCols
                                    },
                                    customize: function (win) {
                                        if (data.dataTableInit.print) {
                                            $(win.document.body).prepend(data.dataTableInit.printHeader);
                                            $(win.document).find("table").addClass('table-sm').removeClass('table-bordered');

                                            if(data.dataTableInit.printFooter){
                                                $(win.document.body).append(data.dataTableInit.printFooter);
                                            }

                                            var imprimir = win.document.querySelector("#print-open");
                                            imprimir.onclick = function () {
                                                imprimir.style.display = 'none';
                                                win.window.print();

                                                var time = win.window.setTimeout(function () {
                                                    imprimir.style.display = 'block';
                                                }, 1000);
                                            }

                                            win.window.onafterprint = function () {
                                                win.window.close();
                                            }
                                        }
                                    }
                                }
                            ]
                        };
                    }
                    $(data.dataTableInit.key).DataTable(iniData);
                }

                if (data.showElement) {
                    $("#" + data.showElement).slideDown(400, function () {
                        var y = parseInt($("#" + data.showElement).offset().top) - 200;
                        $('html, body').animate({scrollTop: y}, 500);
                    });
                }
            }
        });
    });

    /* Input Ajax Request */
    $('html').on('change', '.ajax-input', function () {
        var _this = $(this);
        var route = $(this).attr('data-action');
        var showAfter = $(this).attr('data-showafter');
        var hideAfter = $(this).attr('data-hideafter');
        var block = $(this).attr('data-block');
        var isModal = $(this).attr('data-modal');
        var adicionalData = $($(this).attr('data-adicional')).val(); // Valor localizado em outro input
        var complementarData = $(this).attr('data-complementar'); // Valor de texto literal
        var isChecked = ($(this).is(":checked") ? true : false);
        var value = $(this).val();

        if ($(this).attr('minlength')) {
            if (value.length < $(this).attr('minlength') && value.length > 0) {
                $.toast({
                    heading: "Atenção",
                    text: "É necessário informar ao menos " + $(this).attr('minlength') + " caracteres para pesquisar!",
                    position: 'top-right',
                    icon: "warning",
                    hideAfter: 5000
                });
                return false;
            } else if (value.length < 1) {
                return false;
            }
        }

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'json',
            data: {data: value, dataAdd: adicionalData, dataComplementar: complementarData, checked: isChecked},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                if (isModal == "true") {
                    $(".modal").find('.ajax-loader').fadeIn('500');
                }
                if (block == "true") {
                    $(this).attr("disabled", true);
                }
                $(".loader-form").fadeIn('500');
                $("#modalError").fadeOut();
            },
            success: function (data) {
                $(".loader-form").fadeOut('500');
                if (isModal == "true") {
                    $(".modal").find('.ajax-loader').fadeOut('500');
                }
                if (block == "true") {
                    $(this).attr("disabled", false);
                }

                // Mostrar elemento apos o retorno
                if (showAfter && data.success) {
                    $("#" + showAfter).slideDown(400, function () {
                        var y = parseInt($("#" + showAfter).offset().top) - 200;
                        $('html, body').animate({scrollTop: y}, 500);
                    });
                }
                // Esconder elemento após o retorno
                if (hideAfter && data.success) {
                    $("#" + hideAfter).fadeOut(200);
                }
                /* RESPONSE ACTIONS */
                if (data.toast) {
                    toastMake(data);
                }

                if (data.focus) {
                    $(data.focus).focus();
                }

                if (data.refresh) {
                    document.location.reload(true);
                }

                if (data.redirect) {

                }

                if (data.consulta) {
                    $("#consulta").html(data.consulta);
                }

                if (data.nova_consulta) {
                    $("#nova_consulta").fadeIn(500);
                }

                // Limpa inputs
                if (data.clearInput) {
                    $.each(data.clearInput, function (key, value) {
                        $("#" + value).val('');
                    });
                }
                // Desabilita Inputs
                if (data.disableInput) {
                    $.each(data.disableInput, function (key, value) {
                        $("#" + value).attr('readonly', true);
                    });
                }

                if (data.modalClose) {
                    $(data.modalClose).modal('hide');
                }

                if (data.liberaInput) {
                    $.each(data.liberaInput, function (key, value) {
                        $(value).attr("disabled", false);
                    });
                }

                if (data.modalError) {
                    $("#modalError").html(data.modalError).fadeIn();
                }

                if (data.master_pass_ok) {
                    /*
                    Necessario para saber se a função que calcula automaticamente o valor do desconto/acrescimo deve ou não executar o calculo.
                    Se o campo foi alterado com uma senha master não deve fazer esse calculo no automatico
                    */
                    $("#m_" + $("#closeModalMasterPassword").attr('data-master')).val("1");
                    $("#total_produtos").change();
                    // $("#m_" + $("#closeModalMasterPassword").attr('data-master')).val("0");
                }

                if (data.contentHtml) {
                    $.each(data.contentHtml, function (key, value) {
                        $(key).html(value);
                    });
                }

                // Popula inputs de formulario
                if (data.content) {
                    $.each(data.content, function (key, value) {
                        $("#" + key).val(value);
                    });
                }

                /* Receber Crediario */
                if (data.receber_crediario) {
                    if (data.success) {
                        $("#crediario_identificar").slideUp(600, function () {
                            $("#crediario_receber").slideDown(600, function () {
                                var y = parseInt($("#crediario_receber").offset().top) - 200;
                                $('html, body').animate({scrollTop: y}, 400);
                            });
                        });
                    }
                }

                if (data.dataSlide) {
                    $.each(data.dataSlide, function (key, item) {
                        $(item).slideDown(600);
                    });
                }

                /* Efetivar Venda Crediario */
                if (data.venda_crediario) {

                    if (data.success) {
                        $("#crediario_identificar").slideUp(600, function () {
                            $("#crediario_vender").slideDown(600, function () {
                                var y = parseInt($("#crediario_vender").offset().top) - 200;
                                $('html, body').animate({scrollTop: y}, 400);

                                $("input#nome").val('');
                                $("input#documento").val('');
                                $("input#id").val('');
                                $("#html").html("");
                            });
                        });

                        if ($("#selectPerfilDaVenda option").length == 2) {
                            $("#selectPerfilDaVenda option:eq(1)").attr('selected', 'selected');
                            $("#selectPerfilDaVenda").change();
                        }
                    }
                }

                /* Ativa o recurso popover do Bootstrap */
                if (data.popover) {
                    $('[data-toggle="popover"]').popover({
                        trigger: 'hover'
                    });
                }
            }
        });

    });

    /* Click Ajax Request */
    $('html').on('click', '.ajax-click', function () {
        var route = $(this).attr('data-action');
        var showAfter = $(this).attr('data-showafter');
        var hideAfter = $(this).attr('data-hideafter');
        var block = $(this).attr('data-block');
        var isModal = $(this).attr('data-modal');
        var value = $(this).attr('data-value');

        if (confirm("Deseja realmente executar esta ação?")) {
            $.ajax({
                url: route,
                type: 'POST',
                dataType: 'json',
                data: {data: value},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    if (isModal == "true") {
                        $(".modal").find('.ajax-loader').fadeIn('500');
                    }
                    if (block == "true") {
                        $(this).attr("disabled", true);
                    }
                    $(".loader-form").fadeIn('500');
                    $("#modalError").fadeOut();
                },
                success: function (data) {
                    $(".loader-form").fadeOut('500');
                    if (isModal == "true") {
                        $(".modal").find('.ajax-loader').fadeOut('500');
                    }
                    if (block == "true") {
                        $(this).attr("disabled", false);
                    }

                    // Mostrar elemento apos o retorno
                    if (showAfter && data.success) {
                        $("#" + showAfter).slideDown(400, function () {
                            var y = parseInt($("#" + showAfter).offset().top) - 200;
                            $('html, body').animate({scrollTop: y}, 900);
                        });
                    }
                    // Esconder elemento após o retorno
                    if (hideAfter && data.success) {
                        $("#" + hideAfter).fadeOut(200);
                    }
                    /* RESPONSE ACTIONS */
                    if (data.toast) {
                        toastMake(data);
                    }

                    if (data.focus) {
                        $(data.focus).focus();
                    }

                    if (data.refresh) {
                        document.location.reload(true);
                    }

                    if (data.redirect) {
                        setTimeout(function () {
                            window.location.href = data.redirect;
                        }, 300)
                    }

                    // Popula inputs de formulario
                    if (data.content) {
                        $.each(data.content, function (key, value) {
                            $("#" + key).val(value);
                        });
                    }

                    // Limpa inputs
                    if (data.clearInput) {
                        $.each(data.clearInput, function (key, value) {
                            $("#" + value).val('');
                        });
                    }
                    // Desabilita Inputs
                    if (data.disableInput) {
                        $.each(data.disableInput, function (key, value) {
                            $("#" + value).attr('readonly', true);
                        });
                    }

                    if (data.modalClose) {
                        $(data.modalClose).modal('hide');
                    }

                    if (data.liberaInput) {
                        $.each(data.liberaInput, function (key, value) {
                            $(value).attr("disabled", false);
                        });
                    }

                    if (data.modalError) {
                        $("#modalError").html(data.modalError).fadeIn();
                    }
                }
            });
        }

    });

    /*
    * ====================== END AJAX ==========================
    * */

    /*
    * ==========================================================
    * =================== JQUERY MASK INIT =====================
    * ==========================================================
    * */

    if ($('.jmask-integer').length) {
        $('.jmask-integer').mask('00000000000');
    }
    if ($('.jmask-decimal').length) {
        $('.jmask-decimal').mask('##0,0#', {reverse: true});
    }
    if ($('.jmask-date').length) {
        $('.jmask-date').mask('00/00/0000', {placeholder: "__/__/____"});
    }
    if ($('.jmask-rg').length) {
        $('.jmask-rg').mask('00.000.000-0', {placeholder: "__.___.___-_", reverse: true});
    }
    if ($('.jmask-cpf').length) {
        $('.jmask-cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
    }
    if ($('.jmask-cpf-textual').length) {
        $('.jmask-cpf-textual').mask('000.000.000-00', {placeholder: "CPF (somente números)"});
    }
    if ($('.jmask-cpf-noplaceholder').length) {
        $('.jmask-cpf-noplaceholder').mask('000.000.000-00', {placeholder: "CPF (somente números)"});
    }
    if ($('.jmask-cnpj').length) {
        $('.jmask-cnpj').mask('00.000.000/0000-00', {placeholder: "__.___.___/_____-__"});
    }
    if ($('.jmask-cep').length) {
        $('.jmask-cep').mask('00000-000', {
            placeholder: "_____-___"
        });
    }
    if ($('.jmask-fone').length) {
        $('.jmask-fone').mask('(00)000000009', {placeholder: "(__)________"});
    }

    if ($('.jmask-money').length) {
        $('.jmask-money').mask('000.000.000.000.000,00', {reverse: true});
        // $('.money2').mask("#.##0,00", {reverse: true});
    }
    if ($('.jmask-percent').length) {
        $('.jmask-percent').mask('##0,0#', {reverse: true});
    }

    /*
    * ====================== END MASK ==========================
    * */
});

