$(document).ready(function () {
    var button1 = document.getElementById('ckfinder-popup');

    button1.onclick = function () {
        selectFileWithCKFinder('ckfinder-input');
    };

    function selectFileWithCKFinder(elementId) {
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById(elementId);
                    var a = file.getUrl();
                    var newA = a.slice(36);
                    output.value = newA;
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }
});
