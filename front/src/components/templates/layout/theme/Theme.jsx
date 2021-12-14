import React from "react";
import { Sidebar, Header } from "../../authorized";
import { Outlet } from "react-router-dom";
function Theme() {
  return (
    <div id="wrapper">
      <Sidebar />

      <div id="content-wrapper" className="d-flex flex-column">
        <Header />
        <div className="container-fluid">
          <div className="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 className="h3 mb-0 text-gray-800">Dashboard</h1>
            <a
              href={() => false}
              className="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            >
              <i className="fas fa-download fa-sm text-white-50"></i> Generate
              Report
            </a>
          </div>
          <Outlet />
        </div>
      </div>
    </div>
  );
}

export default Theme;
