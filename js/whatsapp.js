!(function (e) {
    "use strict";

    // Whatsapp Chat

    var url =
        "https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?60668";
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    s.src = url;
    var options = {
        enabled: true,
        chatButtonSetting: {
            backgroundColor: "#250E36",
            ctaText: "",
            borderRadius: "25",
            marginLeft: "20",
            marginBottom: "30",
            marginRight: "30",
            position: "Right",
        },
        brandSetting: {
            brandName: "Aboin",
            brandSubTitle: "ABOIN Care When You Can't Be There.",
            brandImg: "assets/img/logo-icons/favicon.jpeg",
            welcomeText: "Hi, there!\nHow can I help you?",
            messageText: "Hi, there!\nHow can I help you?...",
            backgroundColor: "#c32034",
            ctaText: "Start Chat",
            borderRadius: "25",
            autoShow: false,
            phoneNumber: "+919627702770",
        },
    };
    s.onload = function () {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName("script")[0];
    x.parentNode.insertBefore(s, x);
})(jQuery);
