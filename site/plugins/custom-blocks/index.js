panel.plugin("architecturelandinitiative/blocks", {
  blocks: {
    sliderblock: {
      template: `
        <div class="block">
          <div v-if="content.copy" class="slider-block">
              <div v-if="content.subtitle" class="text-label">
                <p>
                  <k-writer-input
                    v-bind="field('subtitle')"
                    :inline="true"
                    :marks="false"
                    :nodes="false"
                    :value="content.subtitle"
                    @input="update({ subtitle: $event })">
                  </k-writer-input>
                </p>
              </div>
              <div class="text">
                <k-writer-input
                  v-bind="field('copy')"
                  :value="content.copy"
                  @input="update({ copy: $event })">
                </k-writer-input>
              </div>
          </div>
        </div>
      `
    },
    textblock: {
      template: `
        <div class="block">
          <div v-if="content.copy" class="text-block">
              <div v-if="content.subtitle" class="text-label">
                <p>
                  <k-writer-input
                    v-bind="field('subtitle')"
                    :inline="true"
                    :marks="false"
                    :nodes="false"
                    :value="content.subtitle"
                    @input="update({ subtitle: $event })">
                  </k-writer-input>
                </p>
              </div>
              <div class="text">
                <k-writer-input
                  v-bind="field('copy')"
                  :value="content.copy"
                  @input="update({ copy: $event })">
                </k-writer-input>
              </div>
          </div>
        </div>
      `
    },
    contactblock: {
      template: `
      <k-writer-input
        v-bind="field('copy')"
        :value="content.copy"
        @input="update({ copy: $event })">
      </k-writer-input>
      `
    },
    timelineblock: {
      template: `
        <div class="input-wrapper">
          <k-input class="input-title"
            v-bind="field('title')"
            :value="content.title"
            @input="update({ title: $event })">
          </k-input>
          <k-input
            v-bind="field('eventdate')"
            :value="content.eventdate"
            @input="update({ eventdate: $event })">
          </k-input>
          <k-input 
            v-bind="field('typology')"
            :value="content.typology"
            @input="update({ typology: $event })">
          </k-input>
        </div>
      `
    },
    platformblock: {
      template: `
        <div class="input-wrapper">
            <k-input class="input-title"
              v-bind="field('title')"
              :value="content.title"
              @input="update({ title: $event })">
            </k-input>
            <k-input 
              v-bind="field('typology')"
              :value="content.typology"
              @input="update({ typology: $event })">
            </k-input>
            <k-input 
              v-bind="field('members')"
              :value="content.members"
              @input="update({ members: $event })">
            </k-input>
        </div>
      `
    },
  }
});