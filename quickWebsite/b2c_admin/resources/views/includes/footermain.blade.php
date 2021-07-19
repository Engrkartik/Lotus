 <!-- content-footer -->
 <footer class="content-footer">
     <div>© 2021 Designed by - <a href="https://ssssybertech.com/" target="_blank">SSS Sybertech Pvt. Ltd.</a></div>
     <div>
         <nav class="nav gap-4">
             <a href="#" class="nav-link">Home</a>
             <a href="#" class="nav-link">Get Help</a>
         </nav>
     </div>
 </footer>
 <!-- ./ content-footer -->

 </div>
 <!-- ./ layout-wrapper -->

 <!-- Bundle scripts -->
 <script src="{{ asset('public/libsmain/bundle.js') }}"></script>

 <!-- Range slider -->
 <script src="{{ asset('public/libsmain/range-slider/js/ion.rangeSlider.min.js') }}"></script>

 <!-- Form wiard scripts -->
 <script src="{{ asset('public/libsmain/form-wizard/jquery.steps.min.js') }}"></script>

 <!-- Select 2 Js -->
 <script src="{{ asset('public/libsmain/select2/js/select2.min.js') }}"></script>

 <!-- Examples -->
 <script src="{{ asset('public/jsmain/examples/products.js') }}"></script>

 <!-- Main Javascript file -->
 <script src="{{ asset('public/jsmain/app.min.js') }} "></script>

 <!-- Modal Popup file -->
 <!-- <script src="{{ asset('public/jsmain/examples/modal.js') }} "></script> -->

 <!-- Text Editor -->
 <script src="{{ asset('public/libsmain/ckeditor5/ckeditor.js') }} "></script>

 <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>


 <script>
// For Orders Status
function ChangedSelection()
{
var x = document.getElementById("selectstatus").selectedIndex;
var color =document.getElementsByTagName("option")[x].value;
var y = document.getElementById("selectstatus");
y.style.color=color;
}


     //  Select 2 initialization

     $(document).ready(
         function () {
             $('#formdiscount').select2({
                 placeholder: 'Select Discount'
             }).on('select2:open', () => {
                 $(".select2-results:not(:has(a))").append(
                     '<a  data-bs-toggle="modal" data-bs-target="#add_discount" id="discountbtn" class="btn btn-primary btn-icon btn-sm mt-2 mb-2" style="margin-left: 9px;"><i class="bi bi-plus-circle"></i>Create Discount</a>'
                 ).on('click', function (b) {
                     $('#formdiscount').select2('close');

                 });
             });

         });

     $('#formcategory').select2({
         placeholder: 'Select Category'
     }).on('select2:open', () => {
         $(".select2-results:not(:has(a))").append(
             '<a  data-bs-toggle="modal" data-bs-target="#add_category" id="catbtn" class="btn btn-primary btn-icon btn-sm mt-2 mb-2" style="margin-left: 9px;"><i class="bi bi-plus-circle"></i>Create Category</a>'
         ).on('click', function (b) {
             $('#formcategory').select2('close');

         });
     });


     $('#formsubcategory').select2({
         placeholder: 'Select Sub-Category'
     }).on('select2:open', () => {
         $(".select2-results:not(:has(a))").append(
             '<a data-bs-toggle="modal" data-bs-target="#add_subcategory" id="subcatbtn" class="btn btn-primary btn-icon btn-sm mt-2 mb-2" style="margin-left: 9px;"><i class="bi bi-plus-circle"></i>Create Sub-Category</a>'
         ).on('click', function (b) {
             $('#formsubcategory').select2('close');

         });
     });


     //  var test = document.getElementById('discountbtn');
     //  test.onclick = function () {
     //      console.log('Hello');
     //  }
     //  if ($("#discountbtn").data('bs.modal') && $("#discountbtn").data('bs.modal').isShown) {
     //      alert('yes');
     //      console.log('Hello');

     //     $('#formdiscount').select2('close');
     //  }

     //  $('#add_attributes').select2({
     //      placeholder: 'Select Attribute'
     //  });
     $('#atttype').select2({
         placeholder: 'Select Attribute Type',
         tags: true
     });
     $('#attvalue').select2({
         placeholder: 'Select Attribute Type',
         //  minimumInputLength: 15,
         multiple: true,
         tags: true,
         tokenSeparators: [',', '']
     });


     $('#modalcategory').select2({
         placeholder: 'Select Category Name'
     });
 </script>

 <script>
     // FOR ATTRIBUTE MODAL  
     $(document).ready(function () {
         $('#addatt').click(function () {
             $('.attbox').show();
             $('#addatt').hide();
             $('#atttext').hide();
         });
         $('#attclose').click(function () {
             $('#addatt').show();
             $('#atttext').show();
             $('.attbox').hide();
         });
     });
 </script>

 <script>
     //  Form wizard
     $('#wizard1').steps({
         headerTag: 'h3',
         bodyTag: 'section',
         autoFocus: true,
         labels: {
             finish: "Save"
         },
         titleTemplate: '<span class="wizard-index">#index#</span> #title#'
     });

     $('#wizard2').steps({
         headerTag: 'h3',
         bodyTag: 'section',
         autoFocus: true,
         labels: {
             finish: "Save"
         },
         titleTemplate: '<span class="wizard-index">#index#</span> #title#'
     });

     $.fn.steps.reset = function () {
         var wizard = this,
             options = getOptions(this),
             state = getState(this);

         if (state.currentIndex > 0) {
             goToStep(wizard, options, state, 0);

             for (i = 1; i < state.stepCount; i++) {
                 var stepAnchor = getStepAnchor(wizard, i);
                 stepAnchor.parent().removeClass("done")._enableAria(false);
             }
         }
     };

     $('#picker').spectrum({
         type: "flat",
         showInput: true,
         showAlpha: false,
         showButtons: false,
         color: "#f00",
     });
     $('#picker').on('move.spectrum', function (e, tinyColor) {
         var hexVal = tinyColor.toHexString();
         var color_a = document.getElementById('yourcolordummy');
         color_a.style.backgroundColor = hexVal;
     });
     $('#editpicker').spectrum({
         type: "flat",
         showInput: true,
         showAlpha: false,
         showButtons: false,
         color: "#f00",
     });
 </script>

 <script>
     function addItem(elmt) {
         alert(elmt.value);
     }
 </script>


 <!-- Custom Alerts -->
 <script>
     //  FOR ATTRIBUTE
     function attdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete this attribute!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((attdel) => {
             if (attdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'Product attribute has been deleted.',
                     'success'
                 )
             }
             //  else {
             //     Swal.fire("Your Attributes are safe!");
             //  }
         });
     }

     //  FOR STOCK
     function stockdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete this stock!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'Product stock has been deleted.',
                     'success'
                 )
             }
             //  else {
             //     Swal.fire("Your Attributes are safe!");
             //  }
         });
     }

     //  FOR CATEGORY
     function catdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete this category!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'Category has been deleted.',
                     'success'
                 )
             }
              else {
                 Swal.fire("Your Category are safe!");
              }
         });
     }

      //  FOR SUB CATEGORY
      function subcatdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete this Sub Category!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'Sub Category has been deleted.',
                     'success'
                 )
             }
              else {
                 Swal.fire("Your Sub Category are safe!");
              }
         });
     }
      //  FOR ALL SUB CATEGORY
      function allsubcatdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete all Sub Category!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'All Sub Category has been deleted.',
                     'success'
                 )
             }
              else {
                 Swal.fire("All Sub Category are safe!");
              }
         });
     }

      //  FOR PRODUCTS
      function productdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete this Product!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'Product has been deleted.',
                     'success'
                 )
             }
              else {
                 Swal.fire("Your Product is safe now!");
              }
         });
     }
      //  FOR ALL SUB CATEGORY
      function allproductdelconfirmation(ev) {
         ev.preventDefault();
         Swal.fire({
             title: 'Are you sure?',
             text: "You want to delete all Products!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((stkdel) => {
             if (stkdel.isConfirmed) {
                 Swal.fire(
                     'Deleted!',
                     'All Products has been deleted.',
                     'success'
                 )
             }
              else {
                 Swal.fire("All Products are safe!");
              }
         });
     }
 </script>

 <!-- FOR ATTRIBUTE SELECT ALL -->

 <script type="text/javascript">
     $(document).ready(function () {
         //      let branch_all = [];

         //      function formatResult(state) {
         //          if (!state.id) {
         //              var btn = $(
         //                  '<div class="text-right"><button id="all-branch" style="margin-right: 10px;" class="btn btn-default">Select All</button><button id="clear-branch" class="btn btn-default">Clear All</button></div>'
         //              )
         //              return btn;
         //          }

         //          branch_all.push(state.id);
         //          var id = 'state' + state.id;
         //          var checkbox = $('<div class="checkbox"><input id="' + id + '" type="checkbox" ' + (state
         //                  .selected ? 'checked' : '') + '><label for="checkbox1">' + state.text +
         //              '</label></div>', {
         //                  id: id
         //              });
         //          return checkbox;
         //      }

         //      function arr_diff(a1, a2) {
         //          var a = [],
         //              diff = [];
         //          for (var i = 0; i < a1.length; i++) {
         //              a[a1[i]] = true;
         //          }
         //          for (var i = 0; i < a2.length; i++) {
         //              if (a[a2[i]]) {
         //                  delete a[a2[i]];
         //              } else {
         //                  a[a2[i]] = true;
         //              }
         //          }
         //          for (var k in a) {
         //              diff.push(k);
         //          }
         //          return diff;
         //      }

         //      let optionSelect2 = {
         //          templateResult: formatResult,
         //          closeOnSelect: false,
         //          width: '100%'
         //      };

         //      let $select2 = $("#country").select2(optionSelect2);

         //      var scrollTop;

         //      $select2.on("select2:selecting", function (event) {
         //          var $pr = $('#' + event.params.args.data._resultId).parent();
         //          scrollTop = $pr.prop('scrollTop');
         //      });

         //      $select2.on("select2:select", function (event) {
         //          $(window).scroll();

         //          var $pr = $('#' + event.params.data._resultId).parent();
         //          $pr.prop('scrollTop', scrollTop);

         //          $(this).val().map(function (index) {
         //              $("#state" + index).prop('checked', true);
         //          });
         //      });

         //      $select2.on("select2:unselecting", function (event) {
         //          var $pr = $('#' + event.params.args.data._resultId).parent();
         //          scrollTop = $pr.prop('scrollTop');
         //      });

         //      $select2.on("select2:unselect", function (event) {
         //          $(window).scroll();

         //          var $pr = $('#' + event.params.data._resultId).parent();
         //          $pr.prop('scrollTop', scrollTop);

         //          var branch = $(this).val() ? $(this).val() : [];
         //          var branch_diff = arr_diff(branch_all, branch);
         //          branch_diff.map(function (index) {
         //              $("#state" + index).prop('checked', false);
         //          });
         //      });

         $(document).on("click", "#all-branch", function () {
             $("#country > option").not(':first').prop("selected", true); // Select All Options
             $("#country").trigger("change")
             $(".select2-results__option").not(':first').attr("aria-selected", true);
             $("[id^=state]").prop("checked", true);
             $(window).scroll();
         });

         $(document).on("click", "#clear-branch", function () {
             $("#country > option").not(':first').prop("selected", false);
             $("#country").trigger("change");
             $(".select2-results__option").not(':first').attr("aria-selected", false);
             $("[id^=state]").prop("checked", false);
             $(window).scroll();
         });
     });


     $(".js-select2").select2({
         closeOnSelect: false,
         placeholder: "ADD/SELECT ATTRIBUTE VALUES",
         allowHtml: true,
         allowClear: true,
         tags: true // создает новые опции на лету
     });

     //  function iformat(icon, badge) {
     //      var originalOption = icon.element;
     //      var originalOptionBadge = $(originalOption).data("badge");

     //      return $(
     //          '<span><i class="fa ' +
     //          $(originalOption).data("icon") +
     //          '"></i> ' +
     //          icon.text +
     //          '<span class="badge">' +
     //          originalOptionBadge +
     //          "</span></span>"
     //      );
     //  }
 </script>

 <!-- Ckeditor js -->
 <script>
     ClassicEditor.create(document.querySelector('#productdesc'));




     //Start - Select 2 Multi-Select Code======================================================
     var Select2MultiCheckBoxObj = [];
     var id_selectElement = 'id_SelectElement';
     var staticWordInID = 'state_';

     function AddItemInSelect2MultiCheckBoxObj(id, IsChecked) {
         if (Select2MultiCheckBoxObj.length > 0) {
             let index = Select2MultiCheckBoxObj.findIndex(x => x.id == id);
             if (index > -1) {
                 Select2MultiCheckBoxObj[index]["IsChecked"] = IsChecked;
             } else {
                 Select2MultiCheckBoxObj.push({
                     "id": id,
                     "IsChecked": IsChecked
                 });
             }
         } else {
             Select2MultiCheckBoxObj.push({
                 "id": id,
                 "IsChecked": IsChecked
             });
         }
     }

     function IsCheckedAllOption(trueOrFalse) {
         $.map($('#' + id_selectElement + ' option'), function (option) {
             AddItemInSelect2MultiCheckBoxObj(option.value, trueOrFalse);
         });
         $('#' + id_selectElement + " > option").not(':first').prop("selected",
         trueOrFalse); //This will select all options and adds in Select2
         $("#" + id_selectElement).trigger("change"); //This will effect the changes
         $(".select2-results__option").not(':first').attr("aria-selected",
         trueOrFalse); //This will make grey color of selected options

         $("input[id^='" + staticWordInID + "']").prop("checked", trueOrFalse);
     }

     $(document).ready(function () {
         //Begin - Select 2 Multi-Select Code
         $.map($('#' + id_selectElement + ' option'), function (option) {
             AddItemInSelect2MultiCheckBoxObj(option.value, false);
         });

         function formatResult(state) {
             if (Select2MultiCheckBoxObj.length > 0) {
                 var stateId = staticWordInID + state.id;
                 let index = Select2MultiCheckBoxObj.findIndex(x => x.id == state.id);
                 if (index > -1) {
                     var checkbox = $(
                         '<div class="checkbox"><input class="form-check-input select2Checkbox" id="' +
                         stateId + '" type="checkbox" ' + (Select2MultiCheckBoxObj[index]["IsChecked"] ?
                             'checked' : '') +
                         '>&nbsp;&nbsp;<label for="checkbox' + stateId + '">' + state.text +
                         '</label></div>', {
                             id: stateId
                         });
                     return checkbox;
                 }
             }
         }

         let optionSelect2 = {
             templateResult: formatResult,
             closeOnSelect: false,
             width: '100%',
             placeholder: "ADD/SELECT ATTRIBUTE VALUES",
             allowHtml: true,
             allowClear: true,
             tags: true,
             multiple: true,
             tokenSeparators: [',']
         };

         let $select2 = $("#" + id_selectElement).select2(optionSelect2);

         //var scrollTop;
         //$select2.on("select2:selecting", function (event) {
         //    var $pr = $('#' + event.params.args.data._resultId).parent();
         //    scrollTop = $pr.prop('scrollTop');
         //    let xxxx = 2;
         //});

         $select2.on("select2:select", function (event) {
             $("#" + staticWordInID + event.params.data.id).prop("checked", true);
             AddItemInSelect2MultiCheckBoxObj(event.params.data.id, true);
             //If all options are slected then selectAll option would be also selected.
             if (Select2MultiCheckBoxObj.filter(x => x.IsChecked === false).length === 1) {
                 AddItemInSelect2MultiCheckBoxObj(0, true);
                 $("#" + staticWordInID + "0").prop("checked", true);
             }
         });

         $select2.on("select2:unselect", function (event) {
             $("#" + staticWordInID + "0").prop("checked", false);
             AddItemInSelect2MultiCheckBoxObj(0, false);
             $("#" + staticWordInID + event.params.data.id).prop("checked", false);
             AddItemInSelect2MultiCheckBoxObj(event.params.data.id, false);
         });

         $(document).on("click", "#" + staticWordInID + "0", function () {
             //var b = !($("#state_SelectAll").is(':checked'));
             var b = $("#" + staticWordInID + "0").is(':checked');

             IsCheckedAllOption(b);
             //state_CheckAll = b;
             //$(window).scroll();
         });
         $(document).on("click", ".select2Checkbox", function (event) {
             let selector = "#" + this.id;
             let isChecked = Select2MultiCheckBoxObj[Select2MultiCheckBoxObj.findIndex(x => x.id == this
                 .id.replaceAll(staticWordInID, ''))]['IsChecked'];
             $(selector).prop("checked", isChecked);
         });

     });


     //====End - Select 2 Multi-Select Code==
     // $('button').click(function() {
     //    $('.togglable').toggleClass("active");
     // });
     // $('select.id_SelectElement').attr('selected', true).parent().trigger('change');



     // Select 2 add attribute 
     var Select2MultiCheckBoxObj = [];
     var id_selectElement = 'modalpopupatt';
     var staticWordInID = 'modalpopupatt_';

     function AddItemInSelect2MultiCheckBoxObj(id, IsChecked) {
         if (Select2MultiCheckBoxObj.length > 0) {
             let index = Select2MultiCheckBoxObj.findIndex(x => x.id == id);
             if (index > -1) {
                 Select2MultiCheckBoxObj[index]["IsChecked"] = IsChecked;
             } else {
                 Select2MultiCheckBoxObj.push({
                     "id": id,
                     "IsChecked": IsChecked
                 });
             }
         } else {
             Select2MultiCheckBoxObj.push({
                 "id": id,
                 "IsChecked": IsChecked
             });
         }
     }

     function IsCheckedAllOption(trueOrFalse) {
         $.map($('#' + id_selectElement + ' option'), function (option) {
             AddItemInSelect2MultiCheckBoxObj(option.value, trueOrFalse);
         });
         $('#' + id_selectElement + " > option").not(':first').prop("selected",
         trueOrFalse); //This will select all options and adds in Select2
         $("#" + id_selectElement).trigger("change"); //This will effect the changes
         $(".select2-results__option").not(':first').attr("aria-selected",
         trueOrFalse); //This will make grey color of selected options

         $("input[id^='" + staticWordInID + "']").prop("checked", trueOrFalse);
     }

     $(document).ready(function () {
         //Begin - Select 2 Multi-Select Code
         $.map($('#' + id_selectElement + ' option'), function (option) {
             AddItemInSelect2MultiCheckBoxObj(option.value, false);
         });

         function formatResult(state) {
             if (Select2MultiCheckBoxObj.length > 0) {
                 var stateId = staticWordInID + state.id;
                 let index = Select2MultiCheckBoxObj.findIndex(x => x.id == state.id);
                 if (index > -1) {
                     var checkbox = $(
                         '<div class="checkbox"><input class="form-check-input select2Checkbox" id="' +
                         stateId + '" type="checkbox" ' + (Select2MultiCheckBoxObj[index]["IsChecked"] ?
                             'checked' : '') +
                         '>&nbsp;&nbsp;<label for="checkbox' + stateId + '">' + state.text +
                         '</label></div>', {
                             id: stateId
                         });
                     return checkbox;
                 }
             }
         }

         let optionSelect2 = {
             templateResult: formatResult,
             closeOnSelect: false,
             width: '100%',
             placeholder: "ADD/SELECT ATTRIBUTE VALUES",
             allowHtml: true,
             allowClear: true,
             tags: true,
             multiple: true,
             tokenSeparators: [',']
         };

         let $select2 = $("#" + id_selectElement).select2(optionSelect2);

         //var scrollTop;
         //$select2.on("select2:selecting", function (event) {
         //    var $pr = $('#' + event.params.args.data._resultId).parent();
         //    scrollTop = $pr.prop('scrollTop');
         //    let xxxx = 2;
         //});

         $select2.on("select2:select", function (event) {
             $("#" + staticWordInID + event.params.data.id).prop("checked", true);
             AddItemInSelect2MultiCheckBoxObj(event.params.data.id, true);
             //If all options are slected then selectAll option would be also selected.
             if (Select2MultiCheckBoxObj.filter(x => x.IsChecked === false).length === 1) {
                 AddItemInSelect2MultiCheckBoxObj(0, true);
                 $("#" + staticWordInID + "0").prop("checked", true);
             }
         });

         $select2.on("select2:unselect", function (event) {
             $("#" + staticWordInID + "0").prop("checked", false);
             AddItemInSelect2MultiCheckBoxObj(0, false);
             $("#" + staticWordInID + event.params.data.id).prop("checked", false);
             AddItemInSelect2MultiCheckBoxObj(event.params.data.id, false);
         });

         $(document).on("click", "#" + staticWordInID + "0", function () {
             //var b = !($("#state_SelectAll").is(':checked'));
             var b = $("#" + staticWordInID + "0").is(':checked');

             IsCheckedAllOption(b);
             //state_CheckAll = b;
             //$(window).scroll();
         });
         $(document).on("click", ".select2Checkbox", function (event) {
             let selector = "#" + this.id;
             let isChecked = Select2MultiCheckBoxObj[Select2MultiCheckBoxObj.findIndex(x => x.id == this
                 .id.replaceAll(staticWordInID, ''))]['IsChecked'];
             $(selector).prop("checked", isChecked);
         });

     });
 </script>


 </body>

 </html>