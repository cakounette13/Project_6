 Feature: Authentication
  In order to gain access to the add bird area
  As an anonymous user
  I need to be able to register

   Scenario: Register for the first time
     Given I am on the homepage
     And I follow "Inscription"
     Then I should be on "/inscription/"
     And I fill in "fos_user_registration_form[username]" with "quentin"
     And I fill in "fos_user_registration_form[email]" with "quentin@gmail.com"
     And I fill in "fos_user_registration_form[plainPassword][first]" with "qwerty"
     And I fill in "fos_user_registration_form[plainPassword][second]" with "qwerty"
     And I press "envoyer"
     Then I should see "Confirmation"