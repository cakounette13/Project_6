 Feature: Register
  In order to gain access to the add bird area
  As an anonymous user
  I need to be able to register

   Scenario: Register for the first time
     Given I am on the homepage
     Then I follow "Inscription"
     Then I should be on "/inscription/"
     And I fill in "fos_user_registration_form[username]" with "quentin4"
     And I fill in "fos_user_registration_form[email]" with "quentin4@gmail.com"
     And I fill in "fos_user_registration_form[plainPassword][first]" with "qwerty"
     And I fill in "fos_user_registration_form[plainPassword][second]" with "qwerty"
     And I press "envoyer"
     Then I should be on "/inscription/confirmation"
     And I follow "Accueil"
     Then I should be on the homepage