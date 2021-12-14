import React from "react";
import { Routes, Route, Link } from "react-router-dom";
import { Department, Login } from "../../templates/pages";
import { Theme, Guest } from "../../templates/layout";
import useToken from '../../templates/hooks/useToken';


export default function LoginRouters() {

  const { token, setToken } = useToken();
  console.log(process.env);
  if(!token) {
    return <Login setToken={setToken} />
  }
  return (

    <div>
      <Routes>
        
      <Route path="/login" element={<Guest />}>
          <Route index element={<Login setToken={setToken} />} />
          <Route path="login" element={<Login setToken={setToken} />} />
        </Route>
        
        <Route path="/" element={<Theme />}>
          <Route index element={<Home />} />
          <Route path="department" element={<Department />} />
          <Route path="dashboard" element={<Dashboard />} />

          {/* Using path="*"" means "match anything", so this route
            acts like a catch-all for URLs that we don't have explicit
            routes for. */}
          <Route path="*" element={<NoMatch />} />
        </Route>
      </Routes>
    </div>
  );
}



function Home() {
  return (
    <div>
      <h2>Home</h2>
    </div>
  );
}


function Dashboard() {
  return (
    <div>
      <h2>Dashboard</h2>
    </div>
  );
}

function NoMatch() {
  return (
    <div>
      <h2>Nothing to see here!</h2>
      <p>
        <Link to="/">Go to the home page</Link>
      </p>
    </div>
  );
}
