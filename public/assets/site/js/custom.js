
let ImgPlaceholder = null;
let ImgRatio = null;
let ImgPosition = null;
let ImgX = null;
let ImgY = null;
let ImgWidth = null;
let ImgHeight = null;
let showModal = false;


let renderImg = (elem, placeholder) => {
    if (elem.files && elem.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(placeholder).attr('src', e.target.result);
        }

        reader.readAsDataURL(elem.files[0]);
    }
}


// self executing function here
let featureModalEl = document.getElementById('featureModal');
const defaultOptions = {
    placement: 'center',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        // console.log('feature modal is hidden');
        cropper.getCroppedCanvas({ fillColor: '#fff' }).toDataURL();
        $(ImgPlaceholder).attr(
            "src",
            cropper.getCroppedCanvas().toDataURL()
        );
        cropper.destroy();
        ImgPlaceholder = null;
        ImgRatio = null;
        ImgX = null;
        ImgY = null;
        ImgWidth = null;
        ImgHeight = null;
        showModal = false;
        var backdropFound = document.querySelector('[modal-backdrop]');
        document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.style.visibility = "hidden");
    },
    onShow: () => {
        // console.log('feature modal is shown');
        const image = document.getElementById("imageInModal");
        var ratio = ImgRatio;

        sleep(100).then(() => {
            cropper = new Cropper(image, {
                aspectRatio: parseFloat(ratio),
                viewMode: 1,
                background: false,
                zoomable: false,
                zoomable: true,
                crop(event) {
                    $(ImgX).val(event.detail.x);
                    $(ImgY).val(event.detail.y);
                    $(ImgWidth).val(event.detail.width);
                    $(ImgHeight).val(event.detail.height);
                },
            });
            })
    },
    onToggle: () => {
        // console.log('modal has been toggled');
    }
};
openFeatureModal = () => {
    let myFeatureModal = new Modal(featureModalEl, defaultOptions);
    myFeatureModal.show();
}
closeFeatureModal = () => {
    showModal = false;
    let myFeatureModal = new Modal(featureModalEl, defaultOptions);
    myFeatureModal.hide();
    document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.style.visibility = "hidden");
}


let renderImgCrop = (elem, placeholder, ratio, position) => {
    ImgPlaceholder = placeholder;
    ImgRatio = ratio;
    ImgPosition = position;
    const inputs = $(elem).next();
    ImgX = inputs.find(".x");
    ImgY = inputs.find(".y");
    ImgWidth = inputs.find(".width");
    ImgHeight = inputs.find(".height");

    if (elem.files && elem.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(placeholder).attr("src", e.target.result);
            $("#imageInModal").attr("src", e.target.result);
            $("#renderImgRatio").val(ratio);
            $("#renderImgX").val(x);
            $("#renderImgY").val(y);
            $("#renderImgWidth").val(width);
            $("#renderImgHeight").val(height);
        };

        reader.readAsDataURL(elem.files[0]);
        showModal = true;
    }

    // $(".featureModalHeading").html(`you can upload full image if image has a ratio of ${ratio} otherwise you need to crop it.`);
    // openFeatureModal();
};


function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
 }

 window.onload = function () {

    var logo = document.getElementById('image');

    if( $('#image').length )         // use this if you are using class to check
    {
    logo.onload = function () {
        if(showModal){
                $(".featureModalHeading").html(`you can upload full image if image has a ratio of ${ImgRatio} otherwise you need to crop it.`);
                openFeatureModal();
            }
        };
    }

    // setTimeout(function(){
    //     logo.src = 'C:\\Users\\user\Downloads\\3d-internet-secuirty-badge.jpg';
    //     console.log('first')
    // }, 5000);
};
