# Distributed Systems Course Documentation

This repository contains the source code and learning materials for the Distributed Systems course. The project is organized into five folders, each dedicated to a different communication protocol used throughout the course. The focus is on understanding various client-server communication methods and implementing CRUD operations on a **toko** database (with a **barang** table) hosted on a Debian server (IP: `192.168.56.22`).

## Folder Structure

1. **Socket**  
   Demonstrates socket programming for establishing communication between client and server.

2. **RPC Simple**  
   Covers basic Remote Procedure Call `RPC` implementation without a client-server model.

3. **RPC Client**  
   Extends RPC with a client-server setup to perform CRUD operations on the database.

4. **SOAP**  
   Implements a SOAP-based web service for handling CRUD operations on the **toko** database.

5. **WSDL - NuSOAP & WSDL - SOAP** (Folder: `wsdl-toko`)  
   Both WSDL SOAP and NuSOAP implementations are grouped under the `wsdl-toko` folder.  
   - **Server:** Both SOAP and NuSOAP services use the **NuSOAP Library** on the server-side for handling CRUD operations on the **toko** database.  
   - **Client:** Two types of clients are implemented—one using **NuSOAP** and the other using standard **SOAP**. Each demonstrates CRUD operations, building on the concepts from previous modules.

6. **WSDL - Restoran** (Folder: `wsdl-restoran`)
   This folder contains a SOAP-based web service client-server setup for the `RESTORAN` database.
   - **Server:** Hosted on the Debian server, it manages CRUD operations on the `DAFTAR_PESANAN` table within the `RESTORAN` database.
   - **Client:** A SOAP client running on Windows communicates with the server to manage `DAFTAR_PESANAN` records, demonstrating CRUD capabilities over `SOAP`.

8. **RESTful XML - Toko** (Folder: `restful-xml-toko`)
   This folder contains an implementation of RESTful XML-based web services to manage the toko database.
   - **Server:** Hosted on the Debian server at `192.168.56.22`, it allows CRUD operations on the `barang` table using a `RESTful API` that communicates via XML.
   - **Client:** The client application on Windows interacts with the server over the `RESTful XML API` to perform CRUD operations on the `barang` table.   

## Server Information

All web services in this project communicate with a Debian server hosted at IP: `192.168.56.22`. The server manages the **toko** database, and all CRUD operations are performed on the **barang** table.

## URLs for Each Protocol

- **RPC Client**:  
  [http://localhost:8080/www/rpc-xml-toko/client/index.php](http://localhost:8080/www/rpc-xml-toko/client/index.php)

- **SOAP Client**:  
  [http://localhost:8080/www/soap-toko/soap-client/index.php](http://localhost:8080/www/soap-toko/soap-client/index.php)

- **WSDL NuSOAP Client**:  
  [http://localhost:8080/www/wsdl-toko/client-nusoap/index.php](http://localhost:8080/www/wsdl-toko/client-nusoap/index.php)

- **WSDL SOAP Client**:  
  [http://localhost:8080/www/wsdl-toko/client-soap/index.php](http://localhost:8080/www/wsdl-toko/client-soap/index.php)

- **WSDL - Restoran (SOAP Client)**:
  [http://localhost:8080/www/wsdl-restoran/client/index.php](http://localhost:8080/www/wsdl-restoran/client/index.php)

- **RESTful XML - Toko (RESTful Client)**:
  [http://localhost:8080/www/restful-xml-toko/client/index.php](http://localhost:8080/www/restful-xml-toko/client/index.php)


