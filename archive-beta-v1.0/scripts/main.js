(function() {
    var request;
    window.Async = function() {
        return {
            ready: function(){
               try {
                  // Opera, Firefox, Safari
                  request = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     request = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser is old, recomend update it!");
                        return false;
                     }
                  }
               }
               //request = new XMLHttpRequest() || ActiveXObject("Msxml2.XMLHTTP") || ActiveXObject("Microsoft.XMLHTTP");
            },
            start: function(method, to, bool) {
                // const request = new XMLHttpRequest();
               request.open(method, to, bool);
            },
            contentType: function(app = null) {
               // request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               request.setRequestHeader("Content-type", app === null ? "application/x-www-form-urlencoded" : app);
               // request.setRequestHeader("Connection", "close");
            },
            sending: function(content = null) {
               request.send(content === null ? null : content);
               return;
            },
            response: function(where) {
                let sec = document.querySelector(where);
                request.onreadystatechange = function() {
                    if(request.readyState < 4 && request.status < 200){
                       sec.innerHTML = "Loading...";
                    }
                    if (request.readyState === 4 && request.status === 200) {
                        sec.innerHTML = request.responseText;
                    }
                }

            }
        };
    };
//window.async = Async();
}());

// function postAjax(url, data, success) {
//         var params = typeof data == 'string' ? data : Object.keys(data).map(
//                 function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
//             ).join('&');

//         var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
//         xhr.open('POST', url, true);
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === 4 && xhr.status === 200) { success(xhr.responseText); }
//         };
//         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         xhr.send(params);
//         return xhr;
// }


//********       Begin       **************//

window.addEventListener("load",function(){
        const init = {
               create: "create"
            };
            Async().ready();
            Async().start("GET", "routers/router.php?create=1", true); //data.php?title=${title}&link=${link}
            Async().contentType();
            Async().response(".data");
            Async().sending();//`create=${init.create}`

            // View Datas

            Async().ready();
            Async().start("GET", "routers/router.php?read=1", true); //data.php?title=${title}&link=${link}
            Async().contentType();
            Async().response(".data");
            Async().sending();//`create=${init.create}`


      document.querySelector("input[type='submit']").addEventListener("click", function(e) {
            e.preventDefault();
          // let title = document.querySelector(".title").value;
          // let link = document.querySelector(".link").value;

            //****  After Submit  ****

            // document.querySelector("input[type='submit']").setAttribute("disabled", "true");
            // if(document.querySelector("input[type='text']").value === null ){
            //     document.querySelector("input[type='submit']").setAttribute("disabled", "true");
            // }
            // document.querySelector("input[type='text']").addEventListener("change",function(){
            //      document.querySelector("input[type='submit']").removeAttribute("disabled");
            // });
            // document.querySelector("input[type='submit']").onclick = function(){
            //      this.setAttribute("disabled", "true");//document.querySelector("input[type='submit']")
            // }

            const info = {
               title: document.querySelector(".title").value,
               link: document.querySelector(".link").value
            };
            Async().ready();
            Async().start("POST", "routers/router.php", true); //data.php?title=${title}&link=${link}
            Async().contentType();
            Async().response(".data");
            Async().sending(`title=${info.title}&link=${info.link}`);

            document.querySelector("input[type='text']").value = null;

            //****  After click the link  *****

            document.querySelector(".link--view-data").addEventListener("click", function(e){
              // e.preventDefault();

              Async().ready();
              Async().start("GET", "routers/router.php?view=1", true); //data.php?title=${title}&link=${link}
              Async().contentType();
              Async().response(".data");
              Async().sending();

            });



        // postAjax('data.php', {title:title,link:link}, function(data){
        //     document.querySelector(".data").innerHTML += data;
        //     console.log(data);

        // });



      });
});