import React from "react";
import {Navbar, Container , Nav, NavDropdown} from 'react-bootstrap'

import './Header.css' ;

function Header() {
  return (
    <Navbar bg="dark" variant="dark" expand="lg">
      <Container fluid>
        <Navbar.Brand href="#">Mint</Navbar.Brand>
        <Navbar.Toggle aria-controls="navbarScroll" />
        <Navbar.Collapse id="navbarScroll">
          <Nav
            className="me-auto my-2 my-lg-0"
            style={{ maxHeight: "100px" }}
            navbarScroll
          >
            <Nav.Link href="#action1">Dashboard</Nav.Link>
            <Nav.Link href="#action2">Users</Nav.Link>
            <NavDropdown title="Education" id="navbarScrollingDropdown">
              <NavDropdown.Item href="#action3">Department</NavDropdown.Item>
              <NavDropdown.Item href="#action4">Course</NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item href="#action5">Terms</NavDropdown.Item>
            </NavDropdown>
            
          </Nav>

          <Nav  className="justify-content-end"
            style={{ maxHeight: "100px"}} navbarScroll>

            <NavDropdown drop="start" className="ml-auto" title="Account" id="navbarScrollingDropdown">
              <NavDropdown.Item href="#action3">profile</NavDropdown.Item>
              <NavDropdown.Item href="#action4">Password</NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item href="#action5">Logout</NavDropdown.Item>
            </NavDropdown>
            
          </Nav>
          
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default Header;
