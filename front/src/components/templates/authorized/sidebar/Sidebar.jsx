import React from 'react';
import { Link } from "react-router-dom";


function Sidebar(){
    return (
    <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      
      <a className="sidebar-brand d-flex align-items-center justify-content-center" href={() => false}>
        <div className="sidebar-brand-icon rotate-n-15">
          <i className="fas fa-laugh-wink"></i>
        </div>
        <div className="sidebar-brand-text mx-3">Mint <sup>V0.01</sup></div>
      </a>

      
      <div className="sidebar-divider my-0"></div>

      <Link to="/" className="nav-item">Dashboard</Link>
      

    </ul>
    );
}

export default Sidebar;