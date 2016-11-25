Feature: User
  In oder to add new observation and change my password
  As a User
  I need to log in and use functionality

  Background: Log in
    Given I am on the homepage
    And I click on "#logoNavbar"
    Then I should be on "/connexion"
    And I fill in "Nom d'utilisateur" with "quentin"
    And I fill in "Mot de passe" with "qwerty"
    And I press "Connexion"
    Then I should be on the homepage

  @javascript
  Scenario: Add a new observation
    When I click on ".navbar-toggle"
    Then I click on ".fa-eye"
    And I should be on "/nouvelle_observation"
    When I select "Carduelis serinus" from "birds[nom]"
    And I fill in "birds[datevue]" with "24/11/2016"
    And I attach the file "/var/www/html/Project_6/web/images/bird_1.jpeg" to "birds[image]"
    And I press "Envoyer"
    Then I should see "Votre observation est en attente de validation par un Naturaliste"

  Scenario: Change password
    When I follow "Profil"
    Then I should see "Profil"
    Then I follow "Changement de mot de passe"
    And I should see "CHANGEMENT DE MOT DE PASSE"
    Then I fill in "fos_user_change_password_form[current_password]" with "qwerty"
    And I fill in "fos_user_change_password_form[plainPassword][first]" with "asdfg"
    And I fill in "fos_user_change_password_form[plainPassword][second]" with "asdfg"
    And I press "Changer mon mot de passe"
    Then I should be on "/profil/"