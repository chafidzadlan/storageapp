import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./authentication/Login";
import PrivateRoute from "./authentication/PrivateRoute";
import Dashboard from "./google-drive/Dashboard";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <PrivateRoute exact path="/" component={Dashboard} />

        <Route path="/login" component={Login} />
      </Routes>
    </BrowserRouter>
  );
};

export default App;