$(function () {
  // console.log('test2');
  // var vConsole = new VConsole();

  window.onload = function (e) {

    liff.init(function (data) {
      initializeApp();
    });
    console.log(liff);
  };

  function initializeApp(data) {
    var fileExist = false;

    $('#send').on('click', function() {
      if (!$('.en').text())
        return false;

      sendForm().then(function(msg) {
        console.log(msg);
        liff.sendMessages([{
          type: 'text',
          text: msg
        }]).then(function () {
            liff.closeWindow();
        }).catch(function (error) {
            console.log("Error sending message: " + error);
        });
      });
    });
  }

  function sendForm() {
    return new Promise (function(resolve) {
      var data = {
        en: $('.en').text(),
        ch: $('.ch').text(),
        id: $('input[name="id"]').val(),
        model: $('input[name="model"]').val(),
      };
      console.log(data);
      $.ajax({
        url: '/card/update',
        method: 'POST',
        data: data,
        dataType: "JSON",
        success: function(resp) {
          console.log(resp);
          resolve(resp.msg);
        },
        error: function(xhr) {
          console.log(xhr);
          resolve(xhr.responseText);
        }
      });
    });
  }
});
