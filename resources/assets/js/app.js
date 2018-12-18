	            

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//prueba de que main si se cargo como es

//require('./sidebarmenu');
//require('./perfec-scrollbar/dist/perfect-scrollbar.common');
//require('./chartist-plugin-tooltips/dist/chartist-plugin-tooltips.min');
//require('./chartist/dist/chartist.min');

//require('./custom');
//require('./app-style-switcher');
//require('./waves');
//srequire('./pages/dashboards/dashboard1');


window.Vue = require('vue');

window.Gijgo = require('gijgo');




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('organismos', require('./components/organismos.vue'));

const app = new Vue({
    el: '#app'
});


$('#fecha_recibido').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd-mm-yyyy'
});

$('#fecha_oficio').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd-mm-yyyy'

});


$(document).ready(function () {
    var data, grid;
    $.get("list", function(data){
        grid = $('#grid').grid({
            dataSource: data,
            primaryKey: 'id',
            detailTemplate: '<div style="text-align: left"><b>Ente: </b>{ente}</div>', //para agregar mas contenido en las tablas
            responsive: true,
            uiLibrary: 'bootstrap4',
            columns: [
                { title: "id", field: 'id', hidden: true, sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content'},
                { title: "Cedula", field: 'cedula', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content puntero-mano', events: { click: function(e) { window.location.replace('jubilado/' + e.data.id); } }, stopPropagation: true },
                { title: "Nombre", field: 'nombre', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content puntero-mano', events: { click: function(e) { window.location.replace('jubilado/' + e.data.id); } }, stopPropagation: true },
                { title: "Apellido", field: 'apellido', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content puntero-mano', events: { click: function(e) { window.location.replace('jubilado/' + e.data.id); } }, stopPropagation: true },
                { title: "N° Oficio", field: 'nu_oficio', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content'},
                { title: "N° VP", field: 'nu_vp', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content'},
                { title: "Estatus", field: 'estatus', sortable: true, align: 'center', headerCssClass: 'Table-Titulo', cssClass: 'Table-Content'},
                { tmpl: '<a href="#"><i class="fas fa-edit"></i></a>', width: '45px', align: 'center', events: { click: function(e) { window.location.replace('consultar?p=' + e.data.id); } }, stopPropagation: true },
            ],
            pager: { 
                limit: 5, 
                sizes: [5, 10, 15, 20],
                leftControls: [
                 $('<button id="first" class="Font-page btn btn-default btn-sm gj-cursor-pointer" title="Primera página" data-role="page-first" disabled=""><i class="Font-page gj-icon first-page"></i></button>'),
                 $('<button class="Font-page btn btn-default btn-sm gj-cursor-pointer" title="Página anterior" data-role="page-previous" disabled=""><i class="Font-page gj-icon chevron-left"></i></button>'),
                 $('<div class="Font-page " > Página </div>'),
                 $('<div class="Font-page input-group"></div>').append($('<input data-role="page-number" class="Font-page form-control form-control-sm" value="0" type="text">')),
                 $('<div class="Font-page ">de </div>'),
                 $('<div class="Font-page " data-role="page-label-last">0</div>'),
                 $('<button class="Font-page btn btn-default btn-sm gj-cursor-pointer" title="Página siguiente" data-role="page-next"><i class="Font-page gj-icon chevron-right"></i></button>'),
                 $('<button class="Font-page btn btn-default btn-sm gj-cursor-pointer" title="Última página" data-role="page-last"><i class="Font-page gj-icon last-page"></i></button>'),
                 $('<div class="Font-page custom-item"></div>').append($('<select data-role="page-size" class="Font-page"style="margin: 0 5px; width: 50px;"></select>'))
                ],
                rightControls: [
                 $('<div class="Font-page">Registros </div>'),
                 $('<div data-role="record-first" class="Font-page">0</div>'),
                 $('<div class="Font-page"> de </div>'),
                 $('<div data-role="record-last" class="Font-page">0</div>'),
                 $('<div class="Font-page">Total:</div>'),
                 $('<div class="Font-page" data-role="record-total">0</div>').css({ "margin-right": "5px" }),
                ],
            },
        });
        

        $('#btnSearch').on('click', function () {
            grid.reload({ nombre: $('#txtName').val(), apellido: $('#txtLast').val(), cedula: $('#txtCedula').val() });
            $('#first').trigger('click'); 
        });
        $('#btnClear').on('click', function () {
            $('#txtName').val('');
            $('#txtCedula').val('');
            $('#txtLast').val('');
            grid.reload({ nombre: '', apellido: '', cedula:'', });
            $('#first').trigger('click'); 

        });
        

       /* var ancho= screen.width;

        $(window).resize(function(){
            var ancho = $(window).width();

            if (ancho<820) {
            $('tfoot tr th').attr('colspan',8);
            }
            else if (ancho<1024){

                $('tfoot tr th').attr('colspan',10);;
            }
            else if (ancho<1280){
                $('tfoot tr th').attr('colspan',6);
            }
            else{
                $('tfoot tr th').attr('colspan',6);
            }

            });
            if (ancho<820) {
                $('tfoot tr th').attr('colspan',8);
            }
            else if (ancho<1024){

                $('tfoot tr th').attr('colspan',10);
            }
            else if (ancho<1280){
                $('tfoot tr th').attr('colspan',6);
            }
            else{
                $('tfoot tr th').attr('colspan',6);
            }*/
    });
});

