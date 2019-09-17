        let countImages = 0;
        let imagesArray = [];
        let gallery = [];
        let token = $('meta[name="csrf-token"]').attr('content');

        window.myDropzone = new Dropzone("div#dropzoneFileUpload", {
            acceptedFiles: 'image/*,.jpg,.png,.jpeg',
            addRemoveLinks: true,
            maxFilesize: 3,
            dictRemoveFile: '',
            dictCancelUpload: '',
            url: baseUrl+"/dropzone/uploadFiles",
            dictDefaultMessage: "+ Добавить изображение",
            params: {
                _token: token
            },
            init: function () {
                this.on("success", function (file, serverResponse) {
                    let fileName = file.name;
                    let serverFileName = serverResponse.replace(/images\/uploads\/gproducts_img\//g,"");
                    let serverFilePath = serverResponse;

                    createImageArray(fileName, serverFileName, serverFilePath);
                });
                this.on("removedfile", function (file) {
                    console.log(file);
                    let fileDeletedName = file.name;
                    let rmvFile = "";
                    let imageId = null;

                    for( let f = 0; f < imagesArray.length; f++ ){
                        if(imagesArray[f][0] == fileDeletedName)
                        {
                            imageId = f;
                            rmvFile = imagesArray[f][2];
                        }

                    }
                    countImages--;

                    let image = rmvFile;

                    let url = baseUrl+"/dropzone/deleteFiles";
                    let formData = new FormData();
                    formData.append('image_path', image);
                    formData.append('_token', $('[name="_token"]').val());

                    sendAction(url, formData, (data) => {
                        toastr.success(data.msg);
                    });

                    imagesArray.splice(imageId, 1);
                    indexArray(imagesArray, countImages);
                    checkPrimaryImage();
                });
            }
        });


        window.createImageArray = function (fileName, serverName, serverPath){
            imagesArray.push([fileName, serverName, serverPath]);
            countImages++;
            indexArray(imagesArray, countImages);
            checkPrimaryImage();
            //console.log(imagesArray);
        }

        $('.dropzone').on('click', '.change-top-image', function () {

            let imageBlock = $(this).next('.prew-item').next('.dz-image').next('.dz-details');
            let newTopImage = imageBlock.children('.dz-filename').children('span').text();

            let indexInArray = null;
            let serverNameImageShort = null;
            let serverNameImageLong = null;
            for (let i = 0; i < imagesArray.length; i++) {
                if( imagesArray[i][0] == newTopImage){
                    indexInArray = i;
                    serverNameImageShort = imagesArray[i][1];
                    serverNameImageLong = imagesArray[i][2];
                }
            }

            imagesArray.splice(indexInArray, 1);
            imagesArray.unshift([newTopImage, serverNameImageShort, serverNameImageLong]);
            let newImagesArray = imagesArray.filter(function(val){return val});
            imagesArray.length=0;
            imagesArray = newImagesArray;

            indexArray(imagesArray, countImages);
            checkPrimaryImage();
            // console.log(imagesArray);
        });



        $('.dropzone').on('click', '.delete-image', function () {
            let prewBlock = $(this).parent('.dz-preview');
            let deleteBtn = prewBlock.find('a');

            deleteBtn.simulateClick('click');
        });

        $.fn.simulateClick = function() {
            return this.each(function() {
                if('createEvent' in document) {
                    let doc = this.ownerDocument,
                        evt = doc.createEvent('MouseEvents');
                    evt.initMouseEvent('click', true, true, doc.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
                    this.dispatchEvent(evt);
                } else {
                    this.click(); // IE Boss!
                }
            });
        }



        window.indexArray = function (array, count){
            if(count == 0){
                $('#product-gallery').val('');
            }else if(count > 0){
                $('#product-gallery').val('');
                let resault = array;
                $('#product-gallery').val('');
                gallery.length=0;
                for(let i = 0; i < resault.length; i++){
                    gallery[i] = resault[i][2];
                }
                $('#product-gallery').val(gallery);
            }
        }

        window.checkPrimaryImage = function (){
            $(".dz-filename").each(function(indx, element){
                let image = $(element).children('span').text();
                $(element).parent('.dz-details').parent('.dz-preview').children('.prew-item').remove();
                if(imagesArray[0][0] == image){
                    $(element).parent('.dz-details').parent('.dz-preview').prepend('<div class="prew-item" style="position: absolute;border-radius:5px; left: 18px; top:-15px; z-index:24; background:green; color:white; padding: 0px 5px;">основное</div><div class="prew-item prew-action delete-image" style="position: absolute;border-radius:12px; right: -11px; bottom:-11px; z-index:24; background:red; color:white; padding: 0px 7px;  opacity: 0.5;" title="удалить изображение">x</div>');
                }else{
                    $(element).parent('.dz-details').parent('.dz-preview').prepend('<div class="prew-item prew-action change-top-image" style="position: absolute;border-radius:12px; right: -11px; top:-11px; z-index:24; background:green; color:white; padding: 0px 7px; opacity: 0.5;"  title="сделать основным">+</div><div class="prew-item prew-action delete-image" style="position: absolute;border-radius:12px; right: -11px; bottom:-11px; z-index:24; background:red; color:white; padding: 0px 7px;  opacity: 0.5;" title="удалить изображение">x</div>');
                }
            });
        }

        window.addImagesToGpEditForm = function(object){
            let mockFile = object;

            for (var i = 0; i < mockFile.length; i++)
            {
                let dzImage = mockFile[i];
                myDropzone.files.push(dzImage);
                myDropzone.emit('addedfile', dzImage);
                myDropzone.createThumbnailFromUrl(
                    dzImage,
                    myDropzone.options.thumbnailWidth,
                    myDropzone.options.thumbnailHeight,
                    myDropzone.options.thumbnailMethod,
                    true,
                    function(thumbnail) {
                        myDropzone.emit('thumbnail', dzImage, thumbnail);
                        myDropzone.emit("complete", dzImage);
                    });
                createImageArray(dzImage.name, dzImage.name, 'images/uploads/gproducts_img/'+dzImage.name);
            }
        }

