<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$messageHandler = $client->getMessageHandler();
$params = [];

/*
 * on the fly mode
 */
$messageList = $messageHandler->getTbmessageList($params);

foreach ($messageList->getMessages() as $message) {
    echo $message->getId();

    /*
     * acknowledge message received.
     *
     * try {
     *     $messageHandler->updateMessageExported($message->getId());
     * } catch (Exception $e) {
     *     echo $e->getMessage();
     *  }
     */
}

$messageList->close();

/*
 * download mode
 */
$messageHandler->downloadTbmessagesList(__DIR__.'/files/messages.xml', $params);
$messageList = $messageHandler->getTbmessageListLocal(__DIR__.'/files/messages.xml');

foreach ($messageList->getMessages() as $message) {
    echo $message->getId();
}

$messageList->close();

/*
$message = (new Tradebyte\Message\Model\Message())
    ->setType('SHIP')
    ->setOrderId(1)
    ->setOrderItemId(1)
    ->setQuantity(1);
$messageHandler->addMessages([$message]);
*/
