<template>
<transition name="modal-fade">
    <div class="modal-backdrop">
        <div class="modal">
            <slot name="header">
            </slot>
            <slot name="body">
            </slot>

            <div class="footerModal">
                <button type="button" class="btn-green" @click="Accept">
                    Oui
                </button>
                <button type="button" class="btn-red" @click="Refuse">
                    Non
                </button>
            </div>
        </div>
    </div>
</transition>
</template>

<script>
export default {
    name: 'Modal',
    methods: {
        Accept() {
            this.$emit('Accept');
        },
        Refuse() {
            this.$emit('Refuse');
        }
    },
};
</script>

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    overflow-y:auto ;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    height: 20vh;
    width: 45%;
    align-items: stretch;
}

.modal-header {
    padding: 15px;
}

.modal-header {
    position: relative;
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
}

.footerModal {
    border-top: 1px solid #eeeeee;
    padding: 15px;
    display: flex;
    flex-direction: row;
}

button {
    width: 50%;
}

.modal-body {
    position: relative;
    padding: 20px 10px;
}

.btn-green {
    color: white;
    background: var(--color-secondary);
    border: 1px solid var(--color-primary);
    border-radius: 2px;
}

.btn-red {
    color: white;
    background: var(--color-primary);
    border: 1px solid var(--color-secondary);
    border-radius: 2px;
}

.modal-fade-enter,
.modal-fade-leave-to {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity .5s ease;
}
</style>
