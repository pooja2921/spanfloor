var typeCount = $('#typescounter_id').data('countvalue');
// alert(typeCount);
var KTTreeview = function () {
    var demo3 = function() {
        for (i = 0; i < typeCount; i++) {
            data = $('#multiple_value_'+i).val();
            // alert(data);
            $("#kt_tree_3_"+i).jstree({
                'plugins': ["checkbox", "types"],
                'core': {
                    "themes" : {
                        "responsive": false
                    },
                    'data': jQuery.parseJSON(data)

                },
                "types" : {
                    // "default" : {
                    //     "icon" : "fa fa-folder kt-font-warning"
                    // },
                    // "file" : {
                    //     "icon" : "fa fa-file  kt-font-warning"
                    // }
                },
            });

            $('#kt_tree_3_'+i).on('ready.jstree', function(e,data) {
                $('.jstree-node').each(function(){
                    if($(this).children('.treetrash').length == 0){
                        $(this).append("<a class='treetrash kt-font-danger' href='"+ $(this).find('a').children('span').data('link')+"'><i class='la la-trash-o'></i></a>");
                    }
                });
            });

            $('#kt_tree_3_'+i).on('after_open.jstree', function(e,data) {
                $('.jstree-node').each(function(){
                    if($(this).children('.treetrash').length == 0){
                        $(this).append("<a class='treetrash kt-font-danger' href='"+ $(this).find('a').children('span').data('link')+"'><i class='la la-trash-o'></i></a>");
                    }
                });
            });

        }

        $(document).on('click', '.treetrash',function(e){
            var res =confirm("Caregory will be permanently deleted, are you sure?");
            if(!res){
                e.preventDefault();
               return false;
            }
        });

        // handle link clicks in tree nodes(support target="_blank" as well)
        $('div[id^="#kt_tree_3"]').on('select_node.jstree', function(e,data) {

            var link = $('#' + data.selected).find('a');

            if (link.attr("href") != "#" && link.attr("href") != "javascript:;" && link.attr("href") != "") {
                if (link.attr("target") == "_blank") {
                    link.attr("href").target = "_blank";
                }

                document.location.href = link.attr("href");
                return false;

            }

        });
    }


    return {
        //main function to initiate the module
        init: function () {

          demo3();
        }
    };
}();

jQuery(document).ready(function() {
    KTTreeview.init();
});

