

var FUP = FUP || {};
var upload = document.querySelector('[data-toggle="uploadselect"]');
FUP.data = {
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    uploadUrl: '/upload',
}

FUP.uploader = {
    data: {
        selectedFiles: [],
        selectedFilesObject: [],
        clickedForDelete: null,
        allFiles: [],
        multiple: false,
        type: "all",
        next_page_url: null,
        prev_page_url: null,
    },
    initForChoose: (() => {
        upload.addEventListener('click',  function(e){
            if(e.detail === 1){
                var elem = this;
                    multiple = elem.getAttribute('data-multiple');
                    type = elem.getAttribute('type');
                    oldSelectedFiles = elem.querySelector(".selected-files");

                    multiple = !multiple ? "" : multiple;
                    type = !type ? "" : type;
                    oldSelectedFiles = !oldSelectedFiles ? "" : oldSelectedFiles;


                    FUP.uploader.trigger(
                        this,
                        "input",
                        type,
                        oldSelectedFiles,
                        multiple
                    );

            }
        });
    }),
    trigger: (() => {
        elem = null,
        from = "",
        type = "all",
        selected = "",
        multiple = false,
        callback = null

        var elem                = elem;
            multiple            = multiple;
            type                = type;
            oldSelectedFiles    = selected;

        if(oldSelectedFiles !== ""){
            FUP.uploader.data.selectedFiles = oldSelectedFiles.split(",").map(Number);
        } else {
            FUP.uploader.data.selectedFiles = [];
        }


        if("undefined" !== typeof type && type.length > 0){
            FUP.uploader.data.type = type

        }
        if(multiple){
            FUP.uploader.data.multiple = multiple
        }


        const response = axios.post(FUP.data.uploadUrl, {_token: FUP.data.csrf})
                                .then(response => {

                                    openModal();

                                    FUP.plugins.fileUppy()


                                }).catch(error => {

                                })

    }),
    getAllUploads: ((url, search_key = null, sort_key = null) => {
        document.getElementsByClassName('aiz-uploader-all').appendChild('<div class="align-items-center d-flex h-100 justify-content-center w-100"><div class="spinner-border" role="status"></div></div>');
        var params = {};

        if(search_key != null && search_key.length > 0){
            params['search'] = search_key;

        }
        if(sort_key != null && sort_key.length > 0){
            params['sort'] = sort_key;

        } else {
            params['sort'] = 'newest';
        }

        axios.get(url, params, ((data, status) => {
            if(typeof data == 'string'){
                data = JSON.parse(data);

                console.log(data)
            }
        }))

    })
};

FUP.plugins = {
    fileUppy: (() => {

        if(document.getElementById('aiz-upload-files').length > 0) {
            var uppy = Uppy.core({
                autoProceed: true,
            });
            uppy.use(Dashboard, {
                target: "#aiz-upload-files",
                inline: true,
                showLinkToFileUploadResult: false,
                showProgressDetails: true,
                hideCancelButton: true,
                hidePauseResumeButton: true,
                hideUploadButton: true,
                proudlyDisplayPoweredByUppy: false,

                locale: {
                    strings: {
                        addMoreFiles: FUP.local.add_more_files,
                        addingMoreFiles: FUP.local.adding_more_files,
                        dropPaste: FUP.local.drop_files_here_paste_or + ' %{browse}',
                        browse: FUP.local.browse,
                        uploadComplete: FUP.local.upload_complete,
                        uploadPaused: FUP.local.upload_paused,
                        resumeUpload: FUP.local.resume_upload,
                        pauseUpload: FUP.local.pause_upload,
                        retryUpload: FUP.local.retry_upload,
                        cancelUpload: FUP.local.cancel_upload,
                        xFilesSelected: {
                            0: '%{smart_count} ' + FUP.local.file_selected,
                            1: '%{smart_count} ' + FUP.local.files_selected
                        },
                        uploadingXFiles: {
                            0: FUP.local.uploading + ' %{smart_count} ' + FUP.local.file,
                            1: FUP.local.uploading + ' %{smart_count} ' + FUP.local.files
                        },
                        processingXFiles: {
                            0: FUP.local.processing + ' %{smart_count} ' + FUP.local.file,
                            1: FUP.local.processing + ' %{smart_count} ' + FUP.local.files
                        },
                        uploading: FUP.local.uploading,
                        complete: FUP.local.complete,
                    }
                }
            });
            uppy.use(XHRUpload, {
                endpoint: FUP.data.appUrl+"/fup-uploader/upload",
                fieldName: "aiz_file",
                formData: true,
                headers: {
                    'X-CSRF-TOKEN': FUP.data.csrf,
                }
            });
            uppy.on('upload-success', () => {
                FUP.uploader.getAllUploads('/fup-uploader/get_uploaded_files');
            });
        }
    })
}

function openModal(){

    document.getElementById("aizUploaderModal").style.display = "block";
    document.getElementById("aizUploaderModal").classList.add("show")
}

function closeModal(){
    document.getElementById("aizUploaderModal").style.display = "none";
    document.getElementById("aizUploaderModal").classList.remove("show")
}


FUP.uploader.initForChoose();

FUP.plugins.fileUppy();
