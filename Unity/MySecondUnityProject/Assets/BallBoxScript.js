#pragma strict

var ball : Transform;

function Update () {

  if (Input.GetButtonUp("Jump")) {
    Instrantiate(ball, transform.position, transform.rotation);
    Debug.Log("Jumped!");
  }
}
