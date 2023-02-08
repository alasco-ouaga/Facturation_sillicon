$(document).ready(function () {

      $('.get_firstclick_btn').click(function () {
        const indice = document.getElementById("flexRadioDefault1").checked;
        console.log(indice)
        if(indice == true){
          $('.btn1').show();
          $('.btn2').hide();
        }
      })

      $('.new-phone').click(function () {
                $(".modal-create-error").hide();
                $(".modal-create-message").hide();
                $(".modal-length-error").hide();
                $(".btn-valider").show();
      })

        //enregistrement du numero de telephone
        $('.save-phone').click(function () {
        
                var phone = document.getElementById("phone").value;
                let length = phone.length;
                console.log("le numero saisi est : "+phone +"et la taille est :" + phone);
                

                if(phone == ""){
                        $(".modal-create-error").show();
                }
                else{
                        if(length != 8){
                                $(".modal-length-error").show();
                        }
                        else{
                                request = $.ajax({
                                url: "/add/phone/"+phone,
                                type: "get",
                                data: {}
                                });
                        
                                request.done(function (response, textStatus, jqXHR) {
                                        console.log(response);
                                        $(".modal-create-message").show();
                                        $(".modal-create-message").html(response);
                                })
                        
                                request.fail(function (jqXHR, textStatus, errorThrown) {
                                        console.error(
                                        "Nous avons une erreur dans la fonction: " +
                                        textStatus, errorThrown
                                        );
                                })
                        }//endif
                }//endif
        })//

        //modification du numero de telephone
    $('.update-phone').click(function () {
        var id = $(this).parent().find('.phone').attr('id');
  
        console.log(id);
        $(".modal-update-message").hide();
        $(".modal-update-error").hide();
        $(".modal-length-error").hide();
  
        request = $.ajax({
          url: "/get/phone/number/"+id,
          type: "get",
          data: {}
        });
      
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          $(".modal-update-body").html(response);
        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Nous avons une erreur dans la fonction: " +
            textStatus, errorThrown
          );
        })
      })
  
      //enregistre le numero modifier
      $('.save_update_number').click(function () {
        var phoneNumber = document.getElementById("phoneNumber").value;
        var oldPhoneNumber = document.getElementById("oldPhoneNumber").value;
        var phoneId = document.getElementById("phoneId").value;
        const length = phoneNumber.length;
        console.log("le numero est : " +phoneNumber+ "Et l'id est :" +phoneId + "et l'ancien numero est :" +oldPhoneNumber);
        if(phoneNumber == oldPhoneNumber){
  
        }
        else{
            if(phoneNumber == ""){
              $(".modal-length-error").hide();
              $(".modal-update-error").show();
            }
            else{
                if( length != 8){
                  console.log(length);
                  $(".modal-update-error").hide();
                  $(".modal-update-message").hide();
                  $(".modal-length-error").show();
                }
                else{
                                let _token   = $('meta[name="csrf-token"]').attr('content');
                                request = $.ajax({
                                url: "/save/phone/number",
                                type: "post",
                                data: {
                                        phoneId : phoneId,
                                        oldPhoneNumber : oldPhoneNumber,
                                        phoneNumber : phoneNumber,
                                        _token
                      },
                    });
                
                    request.done(function (response, textStatus, jqXHR) {
                      console.log(response);
                      $(".modal-update-message").show();
                      $(".modal-update-message").html(response);
                    })
            
                    request.fail(function (jqXHR, textStatus, errorThrown) {
                      console.error(
                        "Nous avons trouvé une erreur : " +
                        textStatus, errorThrown
                      );
                    })
                }//fin if
            }//endif
        }//endif
      })//endfunction

      //debut de suppression d'un numero de telephone
    $('.delete-phone').click(function () {
        var id = $(this).parent().find('.phone').attr('id');
        
        console.log(id);
        $(".modal-delete-message").hide();
  
  
        request = $.ajax({
          url: "/delete/phone/number/"+id,
          type: "get",
          data: {}
        });
      
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          $(".modal-identifier").html(response);
        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Nous avons une erreur dans la fonction: " +
            textStatus, errorThrown
          );
        })
      })
  
      //confirm delete of number
      $('.confirm-delete-phone').click(function () {
        var id = document.getElementById('phoneId').value;
        console.log(id);
  
        request = $.ajax({
          url: "/confirm/delete/phone/"+id,
          type: "get",
          data: {}
        });
      
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          $(".modal-delete-message").show();
          $(".modal-delete-body").hide();
          $(".modal-delete-message").html(response);
        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Nous avons rencontré une erreur de programme: " +
            textStatus, errorThrown
          );
        })
      })

      //gestion de saisie vide
      $('.click-verified').click(function () {

        const name = document.getElementById('name').value;
        const country = document.getElementById('country').value;
        const city = document.getElementById('city').value;
        const locality = document.getElementById('locality').value;
        const email = document.getElementById('email').value;
        const objet = document.getElementById('objet').value;

        console.log(name,country,locality,email,objet)
        if(name =="" || country =="" || locality =="" || email =="" || objet ==""){
                $('.update-error').show();
        }
      })

      /* recharger directement visible */
  $('.image-manage').click(function(){
        const file_uploade_input = document.querySelector('#file_uploade_input');
        file_uploade_input.addEventListener('change',previewFile);
  
        function previewFile(){
          const file_extension_regex = /\.(jpeg|jpg|gif|png|webp)$/i;
  
          //tester si le nom du fichier est null ou si le nom  selectionné contient jpg,jpeg,pnp,gif
          if (this.files.lenght === 0 || file_extension_regex.test(this.files[0].name) === false){
              return;
          }
          console.log('accepter');
  
          const file = this.files[0];
          const file_reader = new FileReader();
          file_reader.readAsDataURL(file);
          file_reader.addEventListener('load', (event) =>  displayImage(event,file));
        }
  
        function displayImage(event,file){
          const element = document.getElementById('image-selected')
          console.log(element);
          if(element != null){
            element.remove();
          }
  
          const figure_element = document.createElement('figure');
          figure_element.id = 'image-selected';
  
  
          const image_element = document.createElement('img');
          image_element.src = event.target.result;
          image_element.id = "imgage-selected";
  
  
          const figcaption_element = document.createElement('figcaption');
          figcaption_element.textContent = `Fichier selectionner: ${file.name}`;
  
          figure_element.appendChild(image_element);
          figure_element.appendChild(figcaption_element);
  
          
          $('#img').hide();
          $('.display').show();
          $('.btn-save').show();
          document.body.querySelector('.display').appendChild(figure_element);
        }
  
    })

    //voir les details sur un recu
    $('.view-all-data').click(function () {
        const invoice_id = $(this).parent().find('.invoice').attr('id');
        console.log(invoice_id);

        request = $.ajax({
          url: "/view/invoice/data/"+invoice_id,
          type: "get",
          data: {}
          });

          request.done(function (response, textStatus, jqXHR) {
                  console.log(response);
                  $(".modal-data-view").show();
                  $(".modal-data-view").html(response);
          })

          request.fail(function (jqXHR, textStatus, errorThrown) {
                  console.error(
                  "Nous avons une erreur dans la fonction: " +
                  textStatus, errorThrown
                  );
      })
   })

       //voir les details sur un recu
       $('.get-payment-data').click(function () {
        const payment_id = $(this).parent().find('.payment').attr('id');
        console.log(payment_id);

        request = $.ajax({
          url: "/view/payment/data/"+payment_id,
          type: "get",
          data: {}
          });

          request.done(function (response, textStatus, jqXHR) {
                  console.log(response);
                  $(".modal-data-view").show();
                  $(".modal-data-view").html(response);
          })

          request.fail(function (jqXHR, textStatus, errorThrown) {
                  console.error(
                  "Nous avons une erreur dans la fonction: " +
                  textStatus, errorThrown
                  );
      })
   })
    
    
    });