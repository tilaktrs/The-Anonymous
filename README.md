# The-Anonymous
## What does this do?
#### This is a self-hosted, open-source, end-to-end encrypted chat application that doesn't save conversations. Basically, when you create a conversation,
#### a private and public key pair is generated locally on your browser. Nobody else (including the server) knows what the private key is. When you send messages
#### to the other person using this application, the message is encrypted using RSA. Conversations are stored locally as well, so the server literally
#### saves no information about you by design. 

## Why would I need this?
#### Pretty much every social media platform has a chat feature, but they all store your chats in such a way that they can read them. This is a massive invasion of privacy.
#### What if you want to share a secret with one person, and one person only? Wouldn't you feel better knowing potentially hundreds of people don't have access to your conversations?

##Why can't I just use an app like Signal?
#### You can, and you should, but for regular conversations. Most messaging apps store your conversations on their servers.
#### I believe Signal stores them locally though. For the ones that store them on their servers, they might be encrypted, but they're still stored.
#### The Anonymous doesn't even store them. It literally stores nothing but the time at which a conversation was created, its participant's anonymous IDs (randomly generated), 
#### and their public keys (also randomly generated). So what's better? Encryption, or no data  existing in the first place? 

## How does it work?
#### Let's suppose there are two people who want to talk to each other, but what they want to say has to remain an absolute secret, to the point where they don't even want a record of
#### the conversation existing. We'll call them Adam and Eve. Adam creates an anonymous conversation using The Anonymous. On his browser, completely on the client-side, a public key 
#### and private key are generated for him. He sends his public key to the server, and gets an anonymous ID generated for him. A file is created on the server that contains the time
#### at which the conversation was created, when it was last modified, and Adam's anonymous ID and public key. A conversation ID is also generated, and Adam is redirected to the chat 
#### page. He can now send a link for Eve to join by sharing his URL. Eve clicks on the link, and she (still on the client-side) gets a private and public key pair generated for her, 
#### is given an anonymous ID, and is given access to the chat page. Adam and Eve's private keys are stored on their browser's local storage, never by the server. When they send a 
#### message to each other, they encrypt their messages with the other person's public key. The encrypted message is sent to the server, and relayed to the other person, who then
#### decrypts it locally on the client-side with their private key. At no point does the server have access to any private keys, or any plaintext data. Messages that are sent and 
#### received also get stored in the browser's local storage. 

## Snapshots -
![WhatsApp Image 2021-07-11 at 3 14 11 PM (1)](https://user-images.githubusercontent.com/50310860/132939039-324e45a5-a542-43b8-87ae-be427095529d.jpeg)
![WhatsApp Image 2021-07-11 at 3 14 11 PM](https://user-images.githubusercontent.com/50310860/132939040-f068329c-0c77-438e-81d8-b4dec228d7c8.jpeg)
![WhatsApp Image 2021-07-11 at 3 14 33 PM](https://user-images.githubusercontent.com/50310860/132939042-69d4ec8c-f3b7-4496-94bc-aa4540e1090d.jpeg)
![WhatsApp Image 2021-07-11 at 3 16 48 PM](https://user-images.githubusercontent.com/50310860/132939044-7a107bd2-006e-4697-ba46-3d5e1f027b87.jpeg)
![WhatsApp Image 2021-07-11 at 3 17 05 PM](https://user-images.githubusercontent.com/50310860/132939045-eeaab1fa-b606-4a4b-8eca-a00fee7a5398.jpeg)
![WhatsApp Image 2021-07-11 at 3 40 48 PM](https://user-images.githubusercontent.com/50310860/132939046-b6d63f6a-ce28-47b8-ae13-a70abfd80b12.jpeg)
![WhatsApp Image 2021-07-11 at 3 41 09 PM](https://user-images.githubusercontent.com/50310860/132939047-3aa91753-a75d-45e2-b1df-8c425b6e9a81.jpeg)
