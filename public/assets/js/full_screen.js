$(function () {
    $(document).on("click", ".fullscreen-btn", function (e) {
        if (
            !document.fullscreenElement && // alternative standard method
            !document.mozFullScreenElement &&
            !document.webkitFullscreenElement &&
            !document.msFullscreenElement
        ) {
            // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                );
            }
        } else {
            if (document.exitFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.msExitFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                );
            }
        }
    });
});
