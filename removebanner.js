//this script will use for remove 000webhost Branding banner if u are using 000webhost.com for hosting the project else don't use this


    window.onload = function remove()
                {
                    var x = document.getElementsByTagName('body')[0];
                    x.removeChild(x.lastChild);
                    x.removeChild(x.lastChild);
                    x.removeChild(x.lastChild);
                }
