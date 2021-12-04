import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from "react-router-dom";
import LoginRouters from './components/organisms/routes/LoginRouters';

import 'bootstrap/dist/css/bootstrap.css';

import './index.css';
import './components/_settings/fontawesome-free/css/all.min.css';



ReactDOM.render(
  <React.StrictMode>
    <BrowserRouter>
      <LoginRouters />
    </BrowserRouter>
  </React.StrictMode>,
  document.getElementById("root")
);

