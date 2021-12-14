
import axios from "axios";

export default class Auth {
  async Login(state, setToken) {
    axios.defaults.withCredentials = true;
    
    console.log("Login function is started befor axios");
    await axios
      .get("http://127.0.0.1:8000/sanctum/csrf-cookie")
      .then((response) => {
        axios
          .post("http://127.0.0.1:8000/api/login", state)
          .then((response) => {
            console.log("set Token");
            setToken({ token: response.data.access_token });
          });
      });
  }
}
