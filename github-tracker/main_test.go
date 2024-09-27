package main

import (
	"testing"
	"github.com/stretchr/testify/require"
)
func TestDummy(t *testing.T) {
	c := require.New(t)

	result := 22

	c.Equal(22, result)
}

func TestInsert(t *testing.T) {
	c := require.New(t)

	webhook := models.GitHubWebhook{
		Repository: models.Repository{
			FullName: "joselp2024/CustomModule",
		},
		HeadCommit: models.Commit{
			ID:      "51764783d174fe1878f6ce9ec480f863674a90e7",
			Message: "Add sample code for handle-github-webhook",
			Author: models.CommitUser{
				Email:    "joselopez@popoyan.com",
				Username: "joselp2024",
			},
		},
	}

	body, err := json.Marshal(webhook)
	c.NoError(err)

	createdTime := time.Now()

	m := mock.Mock{}
	mockCommit := repository.MockCommit{Mock: &m}

	commit := entity.Commit{
		RepoName:       webhook.Repository.FullName,
		CommitID:       webhook.HeadCommit.ID,
		CommitMessage:  webhook.HeadCommit.Message,
		AuthorUsername: webhook.HeadCommit.Author.Username,
		AuthorEmail:    webhook.HeadCommit.Author.Email,
		Payload:        string(body),
		CreatedAt:      createdTime,
		UpdatedAt:      createdTime,
	}

	ctx := context.Background()

	mockCommit.On("Insert", ctx, &commit).Return(nil)

	err = insertGitHubWebhook(ctx, mockCommit, webhook, string(body), createdTime)
	c.NoError(err)

	m.AssertExpectations(t)
}