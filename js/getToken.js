const getToken = async () => {
  const req = await fetch("http:/127.0.1.1/btree/token.php");
  const res = await req.json();
  console.log(res);
}
