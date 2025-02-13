import React from "react";
import { Navigate } from "react-router-dom";
import { useAuth } from "../../contexts/AuthContext";

export default function PrivateRoute({ children }) {
  const { currentUser } = useAuth();

  // If there's no current user, redirect to the login page
  if (!currentUser) {
    return <Navigate to="/login" />;
  }

  // If the user is authenticated, render the children (protected component)
  return children;
}