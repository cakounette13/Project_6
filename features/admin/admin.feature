Feature: Authentication
  In order to gain access to admin area
  As an admin
  I need to be able to login and logout

  Background: Logging
    Given I am on the homepage
    And I click on "#logoNavbar"
    And I fill in "_username" with "arthur"
    And I fill in "_password" with "qwerty"
    And I press "Connexion"
    Then I should be on the homepage

  Scenario: Promote User
    Then I follow "Administration"
    And I should be on "/administration"
    Then I should see a table with "quentin" inside
    And I click on "a[href='/utilisateurs/promote?id=14']"
    And I should see "Utilisateur quentin promu comme Naturaliste."

  Scenario: Demote Super User
    Then I follow "Administration"
    And I should be on "/administration"
    Then I should see a table with "quentin" inside
    And I click on "a[href='/utilisateurs/demote?id=14']"
    And I should see "Utilisateur quentin retrograde au rang d'Observateur."

  Scenario: Delete User
    Then I follow "Administration"
    And I should be on "/administration"
    Then I should see a table with "quentin" inside
    And I click on "a[href='/utilisateur/supprimer?id=14']"
    And I should see "Utilisateur quentin supprime."