# Distributed Systems Course Documentation

This repository contains the source code and learning materials for the Distributed Systems course. The project is organized into five folders, each dedicated to a different communication protocol used throughout the course. The focus is on understanding various client-server communication methods and implementing CRUD operations on a **toko** database (with a **barang** table) hosted on a Debian server (IP: `192.168.56.22`).

## Folder Structure

1. **Socket**  
   Demonstrates socket programming for establishing communication between client and server.

2. **RPC Simple**  
   Covers basic Remote Procedure Call (RPC) implementation without a client-server model.

3. **RPC Client**  
   Extends RPC with a client-server setup to perform CRUD operations on the database.

4. **SOAP**  
   Implements a SOAP-based web service for handling CRUD operations on the **toko** database.

5. **WSDL - NuSOAP & WSDL - SOAP** (Folder: `wsdl-toko`)  
   Both WSDL SOAP and NuSOAP implementations are grouped under the `wsdl-toko` folder.  
   - **Server:** Both SOAP and NuSOAP services use the **NuSOAP Library** on the server-side for handling CRUD operations on the **toko** database.  
   - **Client:** Two types of clients are implemented—one using **NuSOAP** and the other using standard **SOAP**. Each demonstrates CRUD operations, building on the concepts from previous modules.

## Server Information

All web services in this project communicate with a Debian server hosted at IP: `192.168.56.22`. The server manages the **toko** database, and all CRUD operations are performed on the **barang** table.
