import  (createserver) from "http";
const server = createdServer(( req, res)=> {
    res.statuscode = 200;
    res.setHeader("content-typr","application/json");
    res.end(JSON.Stringify({ message:"Hello World"}));
});
server.listen(8080, () => {
    console.log("server ruuning on port:300");
});