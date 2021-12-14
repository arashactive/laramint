import React from "react";
import { Outlet } from "react-router-dom";


function Guest() {
  return (
    <div id="wrapper">
      

      <div id="content-wrapper" className="d-flex flex-column bg-gradient-primary">
        
        <div className="container-fluid">
          
          <Outlet />
        </div>
      </div>
    </div>
  );
}

export default Guest;
