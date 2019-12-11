import jwtDecode from 'jwt-decode'
import moment from 'moment'
import Cookies from '../mixins/Cookies'

const ID_TOKEN_KEY = 'token';
export default {
	getToken() {
		return Cookies.methods.$getCookie('jwt-token')

		if (!this.tokenHasExpired()) {
      return Cookies.methods.$getCookie(ID_TOKEN_KEY)
		}
		return ''
	},
	saveToken(token) {
    token = token.replace('Bearer', '').trim();
    Cookies.methods.$setCookie(ID_TOKEN_KEY, token);
		window.axios.defaults.headers.common.Authorization = `Bearer ${token}`
	},
	destroyToken() {
    Cookies.methods.$deleteCookie(ID_TOKEN_KEY)
	},
	tokenHasExpired() {
    const token = Cookies.methods.$getCookie(ID_TOKEN_KEY);
		if (!token) {
			return true
		}

		const now = moment();
		const expire = moment.unix(jwtDecode(token).exp);

		if (now > expire) {
			this.destroyToken();
			return true
		}
		return false
	},
}
