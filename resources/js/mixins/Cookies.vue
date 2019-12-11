<script>
  export default {

    methods: {
      $getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
          return match[2]
        }
      },
      $setCookie(name, value) {
        var expires = "; expires=Thu, 01 Jan 2020 00:00:00 UTC";
        document.cookie='jwt-token='+value+expires + ';Path=/'
      },
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
