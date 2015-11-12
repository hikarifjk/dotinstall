#pragma strict

var x : int = 5;


function Start () {
  Debug.Log("Hello World -> " + x);
}

function Update () {

  if (Input.GetButtonUp("Jump")) {
    Debug.Log("Jumped!");
  }
  var xx : float = Input.GetAxis("Horizontal");
  transform.Translate(xx * 0.2, 0, 0);
  // transform.position.z += 0.1;
  // transform.position += Vector3(0, 0, 0.1);
  // transform.Translate(0, 0, 0.1);
}
function OnCollisionEnter(obj : Collision) {
  if (obj.gameObject.name == 'RightWall') {
    Debug.Log("Hit R");
  }
}
