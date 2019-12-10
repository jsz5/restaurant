import jwtDecode from 'jwt-decode'
import moment from 'moment'
import Cookies from '../mixins/Cookies'

const TOKEN_NAME = 'token';
export default {
	getToken() {
		console.log("yyyy "+process.env.MIX_APP_KEY)
		if (!this.tokenHasExpired()) {
      return Cookies.methods.$getCookie(TOKEN_NAME)
		}
		return ''
	},
	tokenHasExpired() {
    const token = Cookies.methods.$getCookie(TOKEN_NAME);
		if (!token) {
			return true
		}
		const now = moment();
		const expire = moment.unix(jwtDecode(token).exp);
		if (now > expire) {
			Cookies.methods.$deleteCookie(TOKEN_NAME)
			return true
		}
		return false
	},
}
