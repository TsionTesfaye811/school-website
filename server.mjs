import  (createserver) from "http";
const server = createdServer(( req, res)=> {
    const method = req.method;
    const url = req.url;
    if (url == "/"){
    if (method  === "GET"){
    res.statuscode = 200;
    res.setHeader("content-typr","application/json");
    res.end(JSON.Stringify({ message:"Hello World"}));
    } else if (method === "POST"){
        let body = "";
        req.on
    }
});
server.listen(8080, () => {
    console.log("server ruuning on port:300");
});import  (createserver) from "http"; = req
const server = createdServer(( req, res)=> {
    const method = req.method;
    if (method  === "GET"){
    res.statuscode = 200;
    res.setHeader("content-typr","application/json");
    res.end(JSON.Stringify({ message:"Hello World"}));
    } else if (method === "POST"){
        let body = ""
    }
});
server.listen(8080, () => {
    console.log("server ruuning on port:300");
});