<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Variations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      #variationBox {
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="container my-5">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Variation Add</h4>
        </div>
        <div class="card-body">
          <form action="./action.php" method="post">
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  name=""
                  id="addVariationCheck"
                />
                Add Variation
              </label>
            </div>
          </div>

          <div id="variationBox">
            <div class="variationType">
              <div class="form-group">
                <select
                  name="variation"
                  class="form-control variationField"
                  onchange="getType(this)"
                >
                  <option value="">Select</option>
                  <option value="size">Size</option>
                  <option value="color">Color</option>
                  <option value="material">Material</option>
                  <option value="style">Style</option>
                </select>
              </div>
            </div>
            <span id="msg"></span>

            <div id="variationData" class="my-2"></div>
            <!-- <button type="button" onclick="addVariationType()">
              Add New Variation
            </button> -->
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function () {
        let msg = $("#msg");
        msg.html("");
        $("#addVariationCheck").on("click", () => {
          $("#variationBox").toggle(1000);
          $("#variationData").empty();
        });
      });

   
      function getType(el) {
        let msg = $("#msg");
        msg.html("");
        let variation = $(el).val();
      
          if (!$("div").hasClass(`${variation}`)) {
            let tableHtml = `<div class="variationTable ${variation} my-2">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="float-left">Selected Option : <span class="text-primary">${variation.toUpperCase()}</span></h6>
                                <input type="hidden" name="variationName[]" value="${variation}">
                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm float-right"
                                    onclick="deleteElement('${variation}')"
                                  >
                                  <i class="fa fa-trash-o"></i>
                                  </button>
        
                                </div>
                            <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <th>Variation <i class="fa fa-question-circle fa-lg" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" title="Variation : e.g - S,M,Green,Red,Cotton."></i></th>
                                                    <th>Stock <i class="fa fa-question-circle fa-lg" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" title="Current Available Units"></i></th>
                                                    <th>MRP <i class="fa fa-question-circle fa-lg" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" title="MRP (Maximum retail price)"></i></th>
                                                    <th>Offer Price <i class="fa fa-question-circle fa-lg" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" title="Price (Selling Price or Offer Price)"></i></th>
                                                    <th>SKU <i class="fa fa-question-circle fa-lg" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" title="SKU (Stock Keeping Unit)"></i></th>
                                                    <th>Action</th>
                                                </thead>
                                                    <tbody id="${variation}">
                                                        <tr>
                                                            <td scope="row"><input type="text" name="${variation}_variation[]" id="" class="form-control" placeholder="${variation}"></td>
                                                            <td><input type="number" name="${variation}_stock[]" id="" class="form-control" placeholder="Stock" value="0"></td>
                                                            <td><input type="text" name="${variation}_price[]" id="" class="form-control" placeholder="0.00"></td>
                                                            <td><input type="text" name="${variation}_offer_price[]" id="" class="form-control" placeholder="0.00"></td>
                                                            <td><input type="text" name="${variation}_sku[]" id="" class="form-control" placeholder="SKU"></td>
                                                            <td><button type="button" class="btn btn-success btn-sm" onclick="addTableRow('${variation}')"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>`;
            $("#variationData").append(tableHtml);
          } else {
            msg
              .html(
                `You've already used the option name "${variation.toUpperCase()}".`
              )
              .css("color", "red");
          }
        
        $(el).val("");
      }

      function addTableRow(tbodyId) {
        let random = "x"
          .repeat(5)
          .replace(
            /./g,
            (c) =>
              "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"[
                Math.floor(Math.random() * 62)
              ]
          );
        let newClass = `${tbodyId}-${random}`;
        let trData = `<tr class="tabletr ${newClass}">
                <td scope="row"><input type="text" name="${tbodyId}_variation[]" id="" class="form-control" placeholder="${tbodyId}"></td>
                <td><input type="number" name="${tbodyId}_stock[]" id="" class="form-control" placeholder="Stock" value="0"></td>
                
                <td><input type="text" name="${tbodyId}_price[]" id="" class="form-control" placeholder="0.00"></td>
                <td><input type="text" name="${tbodyId}_offer_price[]" id="" class="form-control" placeholder="0.00"></td>
                <td><input type="text" name="${tbodyId}_sku[]" id="" class="form-control" placeholder="SKU"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteElement('${newClass}')"><i class="fa fa-trash-o"></i></button></td>
                </tr>`;
        $(`#${tbodyId}`).append(trData);
      }

      //   function addVariationType() {
      //     let random = "x"
      //       .repeat(5)
      //       .replace(
      //         /./g,
      //         (c) =>
      //           "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"[
      //             Math.floor(Math.random() * 62)
      //           ]
      //       );
      //     let newClass = `variationType-${random}`;
      //     let variationType = `<div class="variationType ${newClass} my-3">
      //           <div class="row">
      //             <div class="col-md-11">
      //               <div class="form-group">
      //                 <select
      //                   name="variation"
      //                   class="form-control variationField" onchange="getType(this)"
      //                 >
      //                   <option value="">Select</option>
      //                   <option value="Size">Size</option>
      //                   <option value="Color">Color</option>
      //                   <option value="Qty">Qty</option>
      //                   <option value="Type">Type</option>
      //                 </select>
      //               </div>
      //             </div>
      //             <div class="col-md-1">
      //               <button
      //                 type="button"
      //                 class="btn btn-danger btn-sm"
      //                 onclick="deleteElement('${newClass}')"
      //               >
      //                 <i class="fa fa-trash-o"></i>
      //               </button>
      //             </div>
      //           </div>
      //         </div>`;
      //     $("#variationBox").append(variationType);
      //   }

      function deleteElement(className) {
        $(`.${className}`).remove();
      }
    </script>
  </body>
</html>
