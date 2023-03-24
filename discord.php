<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Informationen aus dem Kontaktformular erhalten
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  // Discord Webhook-URL des Zielchannels
  $webhookurl = "https://discord.com/api/webhooks/1088739495446327336/qCo5ATptBNc15kfChI5EkmwfWjiO32OlRZ3stDVKAs8B-7KmqcyZIKZ_1a77CxYYaJ3j";

  // JSON-Payload vorbereiten
  $payload = json_encode(array(
    "content" => "Neue Bestellung an @everyone:\n\nName: $name\nE-Mail: $email\n Telefon: $phone\nNachricht: $message"
  ));

  // cURL verwenden, um den Webhook zu senden
  $ch = curl_init($webhookurl);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
  ]);
  $result = curl_exec($ch);
  curl_close($ch);

  // Erfolgsmeldung ausgeben oder Fehlermeldung, falls etwas schiefgegangen ist
  if ($result === false) {
    echo "Beim erfassen der Bestellung ist ein Fehler aufgetreten.";
  } else {
    echo "Die Bestellung wurde erfolgreich gesendet.";
  }
}
?>
