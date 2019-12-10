<script >


  export default {

    methods: {
      $getCookie(name) {
        var AES = require("crypto-js/aes");
        var CryptoJS = require("crypto-js");
        var Base64 = require('js-base64').Base64;
        console.log("cookie "+document.cookie)
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
          console.log(match[2])
          var encrypted=match[2].replace(/%3D/g, '')
          console.log(encrypted)
          console.log("en "+Base64.decode(encrypted))
          console.log("entt "+encrypted)
          var b=Base64.decode(encrypted)
          console.log("kkkkkkutggtf"+b.value)
          var encrypted_json = JSON.parse(b);
          console.log("en "+atob(encrypted))
          var key = "xQ7Kzvr/7z01XXseJca+kD5I2pQuOlJSvpuGlf1YToY=";

// Now I try to decrypt it.
          var decrypted = CryptoJS.AES.decrypt(encrypted_json.value, CryptoJS.enc.Base64.parse(key), {
            iv : CryptoJS.enc.Base64.parse(encrypted_json.iv)
          });
          // var decrypted = AES.decrypt(match[2], 'xQ7Kzvr/7z01XXseJca+kD5I2pQuOlJSvpuGlf1YToY=');
          console.log("kkk "+decrypted)
          console.log("decrypted "+decrypted.toString(CryptoJS.enc.Utf8))
          var decr=decrypted.toString(CryptoJS.enc.Utf8)
          return decr
        }
      },
    
      // $setCookie(name, value) {
      //   var expires = "; expires=Thu, 01 Jan 2020 00:00:00 UTC";
      //   document.cookie='jwt-token='+value+expires + ';Path=/'
      // },
      $deleteCookie(name) {
        document.cookie = name + '=' + ';Path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC'
      },
      $deleteUMTCookies(name) {
        this.$deleteCookie('UMTCommunity')
        this.$deleteCookie('jwt-token')
      }
    },
  }
</script>
