//<![CDATA[

$(window).on('load', function () {
  // Removed quickView.initquickView();
});

var quickView = {

  'addCloseButton': function () {
    $('.quickview-wrapper').prepend("<a href='javascript:void(0);' class='quickview-btn' onclick='quickView.closeButton()'><i class='icon-close'></i></a>");
  },

  'closeButton': function () {
    $('.quickview-overlay').hide();
    $('.quickview-wrapper').hide().html('');
    $('.quickview-loader').hide();
  },

  ajaxView: function (url) {
    const path = window.location.href.split('?')[0] + url;

    $.ajax({
      url: url,
      type: 'get',
      beforeSend: function () {
        $('.quickview-overlay').show();
        $('.quickview-loader').show();
      },
      success: function (json) {
        $('.quickview-loader').hide();
        $('.quickview-wrapper').html(json['html']);
        quickView.addCloseButton();
        $('.quickview-wrapper').show();
      }
    });

  }
};

//]]>
