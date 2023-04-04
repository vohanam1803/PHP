self.addEventListener('message', function(e) {
  setInterval(() => {
    if (e.data.cmd == 'read') {
      //console.log(e.data.file);
      var request = new XMLHttpRequest();
      request.open('GET', e.data.file, true);
      request.send(null);
      request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
          var type = request.getResponseHeader('Content-Type');
          if (type.indexOf("text") !== 1) {
            //console.log(request.responseText);
            self.postMessage(request.responseText);
          }
        }
      }
    }
  }, 840);
}, false);