<script >


  export default {
    data() {
      return {
        title: process.env.MIX_APP_TITLE
      }
    },
    methods: {
      //TODO: obgadać: za każdym razem jak coś robimy odkodowuje token
      $getCookie(name) {
        var CryptoJS = require("crypto-js");
        var Base64 = require('js-base64').Base64;
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
          console.log("grgrgr"+this.title)
          var encrypted=match[2].replace(/%3D/g, '') //%3D to padding w base64, żeby długość się zgadzała->powoduje dziwne znaki doklejane na koniec
          var encrypted_json = JSON.parse(Base64.decode(encrypted));
          var key = "xQ7Kzvr/7z01XXseJca+kD5I2pQuOlJSvpuGlf1YToY=";
          var decrypted = CryptoJS.AES.decrypt(encrypted_json.value, CryptoJS.enc.Base64.parse(key), {
            iv : CryptoJS.enc.Base64.parse(encrypted_json.iv)
          });
          return decrypted.toString(CryptoJS.enc.Utf8)
        }
      },
      $deleteCookie(name) {
        document.cookie = name + '=' + ';Path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC'
      },

    },
  }
</script>
